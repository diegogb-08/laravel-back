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

    public function deleteMessage(Request $request, $id){

        $user_id = $request -> input('user_id');

        $message = Message::find($id);

        // $userId = $message['user_id'];
        // $userId = $message -> where('user_id', $user_id)->first();

        if($user_id === $message['user_id']){
            try{
                return $message->delete();

            }catch(QueryException $error){
                return $error;
            }
        }else{
            return response()-> json([
                'success' => false,
                'message' => 'Post can not be deleted'
            ], 500);
        }
    }

    public function indexAllMessagesByPartyId($id){
        try{
            return Message::all()->where('party_id', '=', $id);
    
        }catch(QueryException $error){
            return $error;
        }
    }
}
