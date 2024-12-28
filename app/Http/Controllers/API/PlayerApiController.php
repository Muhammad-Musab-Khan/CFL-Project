<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Player;

class PlayerApiController extends Controller
{
    public function getAllPlayers()
    {
        $players = Player::with('category')->get();
        return response()->json($players);
    }

    public function getPlayersByCategory($id)
    {
        $players = Player::where('category_id', $id)->with('category')->get();
        return response()->json($players);
    }
}
