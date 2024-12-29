<?php 
namespace App\Services;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerService
{
    public function getPlayersByCategory($categoryName)
    {
        return Player::whereHas('category', function ($query) use ($categoryName) {
            $query->where('name', $categoryName);
        })->with('category')->get();
    }

    public function searchPlayers($query)
    {
        return Player::where('name', 'like', '%' . $query . '%')
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->get();
    }

    public function getAllPlayers()
    {
        return Player::with('category')->get();
    }

    public function createPlayer($data)
    {
        if (isset($data['image'])) {
            $image = $data['image'];
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
            $data['image_url'] = 'img/' . $imageName;
        }

        return Player::create($data);
    }

    public function updatePlayer($id, $data)
    {
        $player = Player::findOrFail($id);

        if (isset($data['image'])) {
            if (!empty($player->image_url) && file_exists(public_path($player->image_url))) {
                unlink(public_path($player->image_url));
            }

            $image = $data['image'];
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName);
            $data['image_url'] = 'img/' . $imageName;
        }

        $player->update($data);

        return $player;
    }

    public function deletePlayer($id)
    {
        $player = Player::findOrFail($id);

        if (!empty($player->image_url) && file_exists(public_path($player->image_url))) {
            unlink(public_path($player->image_url));
        }

        $player->delete();
    }
}
