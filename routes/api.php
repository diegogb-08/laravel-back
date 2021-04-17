<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\UserController;

use App\Http\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware'=> 'cors'], function () {



    // Game Controller Routes
    Route::post('/game', [GameController::class, 'addGame' ]);
    Route::delete('/game', [GameController::class, 'deleteGame']);

    //User Controller routes
    Route::post('/register', [UserController::class, 'registerUser']);
    Route::post('/login', [UserController::class, 'loginUser']);
    Route::post('/logout', [UserController::class, 'logoutUser']);

    Route::get('/users', [UserController::class, 'indexAllUsers']);
    Route::get('/user/{id}', [UserController::class, 'indexUser']);

    // Route::put('/user/update', [UserController::class, 'updateUser']);


});




