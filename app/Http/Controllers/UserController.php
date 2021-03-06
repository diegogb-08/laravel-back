<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Facade\Ignition\QueryRecorder\Query;


class UserController extends Controller
{
    public function registerUser (Request $request) {
        $name = $request ->input('name');
        $email = $request ->input('email');
        $password = $request ->input('password');
        $username = $request ->input('username');

        
        $password = Hash::make($password);

        try {
            return User::create([
                'name' => $name, 
                'email' => $email, 
                'password' => $password,  
                'username' => $username
            ]);
        } catch (QueryException $error) {
            $eCode = $error -> errorInfo[1];

            if($eCode == 1062){
                return response()-> json ([
                    'error' => 'User already registered'
                ]);
            }
        }
    }


    public function loginUser(Request $request){

        $email = $request->input('email');
        $password = $request->input('password');

        try {

            $validate_user = User::select('password')
            ->where('email', 'LIKE', $email)
            ->first();
            
            if(!$validate_user){
                return response()->json([
                    'error' => 'Email o password inválida'
                ]);
            }

            $hashed = $validate_user-> password;

            //comprobamos que password corresponde con el email
            if(Hash::check($password, $hashed)){

                //si existe, generamos su token
                $length = 50;
                $token = bin2hex(random_bytes($length));

                //guardamos en token en su campo en la base de declarations
                User::where('email', $email)
                ->update(['token' => $token]);

                //devolvemos la información actualizadas
                return User::where('email', 'LIKE' ,$email)
                ->get();
            }else{
                return response()->json([
                    'error' => 'Email o password incorrecta'
                ]);
            }

        }catch (QueryException $error) {
            return response()->$error;
        }

    }

    public function logoutUser(Request $request){
        $id = $request->input('id');

        try{
            return User::where('id', '=', $id)
            ->update(['token'=>'']);
        }catch(QueryException $error) {
            return $error;
        }
    }

    public function indexAllUsers(){
        try{
            return User::all();
        }catch(QueryException $error) {
            return $error;
        }
    }

    public function indexUser($id){
        try{
            return User::all()->where('id', '=', $id)
            ->makeHidden(['password'])->keyBy('id');
        } catch(QueryException $error) {
            return $error;
        }
    }


<<<<<<< HEAD
    // public function updateUser(Request $request){

    //     $id = $request->input('id');

    //     $username = $request->input('username');
    //     $name = $request->input('name');
    //     $email = $request->input('email');


    //     try{
    //         return User::all()->where('id', '=', $id)
    //         ->update(['username' => $username, 'name' => $name, 'email' => $email]);
    //     } catch(QueryException $error) {
    //         return $error;
    //     }
    // }
}
=======
    public function modifyUser(Request $request, $id){


        $username = $request->input('username');
        $name = $request->input('name');
        $email = $request->input('email');

        try{
            return User::where('id', '=', $id)->update([
                'username' => $username, 
                'name' => $name, 
                'email' => $email
            ]); 
        } catch(QueryException $error) {
            return $error;
        }
    }
}

>>>>>>> 38be0a4948f41112b2169e42270fe18ffa20416f
