<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{

    // Add a new game
    public function addGame(Request $request){

        $title = $request->input('title');
        $thumbnail_url = $request->input('thumbnail_url');
        $url = $request->input('url');

        try{

            return Game::create([
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

    // Get all Games

    public function indexAllGames (){
        try{
            return Game::all();
        }catch(QueryException $error){
            return $error;
        }
    }

    // Get a Game by Id

    public function indexGameById ($id){
        try{
            return Game::all()->where('id', '=', $id);

        } catch(QueryException $error) {
            return $error;
        }
    }

    // Delete a Game

    public function deleteGame($id){
        try {
            return Game::where ('id', '=', $id)
            ->delete();
        } catch(QueryException $error){
            return $error;
        }
    }

}
