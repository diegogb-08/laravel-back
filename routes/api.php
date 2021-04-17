<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
