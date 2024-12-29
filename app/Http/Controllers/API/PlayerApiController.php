<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\PlayerService;
use Illuminate\Http\Request;

class PlayerApiController extends Controller
{
    protected $playerService;

    public function __construct(PlayerService $playerService)
    {
        $this->playerService = $playerService;
    }

    public function index()
    {
        $players = $this->playerService->getAllPlayers();
        return response()->json(['players' => $players]);
    }

    public function show($id)
    {
        $player = $this->playerService->getAllPlayers()->find($id);

        if (!$player) {
            return response()->json(['error' => 'Player not found'], 404);
        }

        return response()->json(['player' => $player]);
    }

    public function search(Request $request)
    {
        $query = $request->query('query', '');
        $players = $this->playerService->searchPlayers($query);

        return response()->json(['players' => $players]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'position' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $player = $this->playerService->createPlayer($validated);

        return response()->json(['message' => 'Player created successfully', 'player' => $player], 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'position' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $player = $this->playerService->updatePlayer($id, $validated);

        return response()->json(['message' => 'Player updated successfully', 'player' => $player]);
    }

    public function destroy($id)
    {
        $this->playerService->deletePlayer($id);
        return response()->json(['message' => 'Player deleted successfully']);
    }
}
