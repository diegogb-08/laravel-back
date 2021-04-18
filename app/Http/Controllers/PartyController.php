<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;
use App\Models\Party;

class PartyController extends Controller
{
    // Create party with Game Id
    public function createNewParty(Request $request)
    {
        $name = $request->input('name');
        $game_id = $request->input('game_id');
        $owner_id = $request->input('owner_id');

        try{

            return Party::create([
                'name' => $name,
                'game_id' => $game_id,
                'owner_id' => $owner_id
            ]);

        }catch (QueryException $error) {
            
            $eCode = $error->errorInfo[1];

            if($eCode == 1062) {
                return response()->json([
                    'error' => "The party you are trying to add already exist"
                ]);
            }

        }

    }
    
    public function indexAllGroupsByGameId($id)
    {
        try{
            return Party::all()->where('game_id', '=', $id);
    
        }catch(QueryException $error){
            return $error;
        }
    }
}
