<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use Facade\Ignition\QueryRecorder\Query;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //Post Message
    public function postMessage(Request $request){

        $user_id = $request -> input('user_id');
        $party_id = $request -> input('party_id');
        $message = $request -> input('message');

        try{
            return Message::create([
                'user_id' => $user_id,
                'party_id' => $party_id,
                'message' => $message,
            ]);

        }catch(QueryException $error){
            return $error;
        }
    }

    public function deleteMessage($id){

        $message = Message::find($id);

        try{

            return $message->delete();

        }catch(QueryException $error){
            return $error;
        }
    }
}
