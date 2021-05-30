<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $items = Game::all();
        return response()->json([
            'data' => $items
        ], 200);
    }
    public function store(Request $request){
        $item = Game::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);
    }
    // public function show(Game $game)
    // {
    //     $item = Game::where('roomId', $game);
    //     if ($item) {
    //     return response()->json([
    //         'data' => [$item,$game]
    //     ], 200);
    //     } else {
    //     return response()->json([
    //         'message' => 'Not found',
    //     ], 404);
    //     }
    // }
    public function test($roomId)
    {
        $item = Game::where('roomId', $roomId)->get();
        if ($item) {
        return response()->json([
            'data' => $item
        ], 200);
        } else {
        return response()->json([
            'message' => 'Not found',
        ], 404);
        }
    }
    public function update(Request $request)
    {
        $update = [
            'player2' => $request->player,
        ];
        $item = Game::where('roomId', $request->roomId)->update($update);
        if ($item) {
            return response()->json([
                'message' => 'Updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
    public function game(Request $request)
    {
        $update=[
            'game'=>$request->game
        ];
        Game::where('roomId',$request->roomId)->update($update);
    }
    public function destroy(Request $request)
    {
        $item = Game::where('roomId', $request->roomId)->delete();
        if ($item) {
            return response()->json([
                'message' => 'Deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}
