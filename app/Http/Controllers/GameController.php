<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Games;

class GameController extends Controller
{

    // Add a new game
    public function addGame(Request $request){

        $title = $request->input('title');
        $thumbnail_url = $request->input('thumbnail_url');
        $url = $request->input('url');

        try{

            return GameController::create([
                'title' => $title,
                'thumbnail_url' => $thumbnail_url,
                'url' => $url,
            ]);

        }catch (QueryException $error) {
            
            $eCode = $error->errorInfo[1];

            if($eCode == 1062) {
                return response()->json([
                    'error' => "The game you are trying to add already exist"
                ]);
            }

        }
    }

    // Delete a Game

    public function deleteGame(Request $request){

        $idGame = $request->input('id');

        try {
            return GameController::where ('id', '=', $idGame)
            ->delete();
        } catch(QueryException $error){
            return $error;
        }
    }

}
