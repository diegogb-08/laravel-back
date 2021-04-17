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
    Route::delete('/game/{id}', [GameController::class, 'deleteGame']);
    Route::post('/game', [GameController::class, 'addGame' ]);

    //User Controller routes
    Route::post('/register', [UserController::class, 'registerUser']);

});




