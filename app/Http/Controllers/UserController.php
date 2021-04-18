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
}
