<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\Membership;

class PartyController extends Controller
{
    // Create party with Game Id
    public function createNewParty(Request $request){
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

    //Get all Parties by Game Id
    public function indexAllPartiesByGameId($id){
        try{
            return Party::all()->where('game_id', '=', $id);
    
        }catch(QueryException $error){
            return $error;
        }
    }

    public function login(Request $request){

        $user_id = $request -> input('user_id');
        $party_id = $request -> input('party_id');

        try{
            return Membership::create([
                'user_id' => $user_id,
                'party_id' => $party_id
            ]);

        }catch(QueryException $error){
            return $error;
        }
    }

    public function logout($id){

        $member = Membership::find($id);

        try{

            return $member->delete();

        }catch(QueryException $error){
            return $error;
        }
    }
}
