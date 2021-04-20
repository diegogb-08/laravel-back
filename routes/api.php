<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware'=> 'cors'], function () {



    // Game Controller Routes
    Route::delete('/game/{id}', [GameController::class, 'deleteGame']);
    Route::post('/game', [GameController::class, 'addGame' ]);
    Route::get('/game', [GameController::class, 'indexAllGames']);
    Route::get('/game/{id}', [GameController::class, 'indexGameById']);

    //User Controller routes
    Route::post('/register', [UserController::class, 'registerUser']);
    Route::post('/login', [UserController::class, 'loginUser']);
    Route::post('/logout', [UserController::class, 'logoutUser']);
    Route::get('/users', [UserController::class, 'indexAllUsers']);
    Route::get('/user/{id}', [UserController::class, 'indexUser']);
<<<<<<< HEAD

    // Route::put('/user/update', [UserController::class, 'updateUser']);
=======
    Route::put('/user/update/{id}', [UserController::class, 'modifyUser']);
>>>>>>> 38be0a4948f41112b2169e42270fe18ffa20416f
    
    // Party Controller Routes
    Route::post('/party', [PartyController::class, 'createNewParty' ]);
    Route::get('/party/game/{id}', [PartyController::class, 'indexAllPartiesByGameId' ]);
    Route::post('/party/login', [PartyController::class, 'login' ]);
    Route::delete('/party/logout/{id}', [PartyController::class, 'logout' ]);

    // Message Controller Routes
    Route::post('/message', [MessageController::class, 'postMessage' ]);
    Route::delete('/message/{id}', [MessageController::class, 'deleteMessage' ]);
<<<<<<< HEAD
=======
    Route::get('/message/{id}', [MessageController::class, 'indexAllMessagesByPartyId']);
>>>>>>> 38be0a4948f41112b2169e42270fe18ffa20416f
});




