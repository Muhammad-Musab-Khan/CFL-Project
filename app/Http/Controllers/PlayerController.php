<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Category;

class PlayerController extends Controller
{
    /**
     * Display players for the selection page.
     */
    public function showPlayers()
    {
        $batsmen = Player::whereHas('category', function ($query) {
            $query->where('name', 'Batsmen');
        })->with('category')->get();

        $bowlers = Player::whereHas('category', function ($query) {
            $query->where('name', 'Bowlers');
        })->with('category')->get();

        $wicketkeepers = Player::whereHas('category', function ($query) {
            $query->where('name', 'Wicketkeepers');
        })->with('category')->get();

        $allRounders = Player::whereHas('category', function ($query) {
            $query->where('name', 'All-Rounders');
        })->with('category')->get();

        $availablePlayers = Player::with('category')->get();

        return view('selection', compact('batsmen', 'bowlers', 'wicketkeepers', 'allRounders', 'availablePlayers'));
    }

    /**
     * Search players for AJAX functionality.
     */
    public function searchPlayers(Request $request)
    {
        $query = $request->query('query', '');

        $players = Player::where('name', 'like', '%' . $query . '%')
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->get();

        return response()->json([
            'players' => $players,
        ]);
    }

    /**
     * Display all players for admin view.
     */
    public function index()
    {
        $players = Player::with('category')->paginate(10);
        return view('players.index', compact('players'));
    }

    /**
     * Show the form for creating a new player.
     */
    public function create()
    {
        $categories = Category::all();
        return view('players.create', compact('categories'));
    }

    /**
     * Store a newly created player in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'position' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
            $validated['image_url'] = 'img/' . $imageName;
        }

        Player::create($validated);

        return redirect()->route('admin.players.index')->with('success', 'Player added successfully!');
    }

    /**
     * Show the form for editing the specified player.
     */
    public function edit($id)
    {
        $player = Player::findOrFail($id);
        $categories = Category::all();
        return view('players.edit', compact('player', 'categories'));
    }

    /**
     * Update the specified player in the database.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'position' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $player = Player::findOrFail($id);

        if ($request->hasFile('image')) {
            if (!empty($player->image_url) && file_exists(public_path($player->image_url))) {
                unlink(public_path($player->image_url));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
            $validated['image_url'] = 'img/' . $imageName;
        }

        $player->update($validated);

        return redirect()->route('admin.players.index')->with('success', 'Player updated successfully!');
    }

    /**
     * Remove the specified player from storage.
     */
    public function destroy($id)
    {
        $player = Player::findOrFail($id);

        if (!empty($player->image_url) && file_exists(public_path($player->image_url))) {
            unlink(public_path($player->image_url));
        }

        $player->delete();
        return redirect()->route('admin.players.index')->with('success', 'Player deleted successfully!');
    }
}
