<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FormController;
use App\Http\Controllers\API\ScoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:sanctum'], function () {
    //crud student
    Route::get('/show',[FormController::class, 'show']);
    Route::post('/create', [FormController::class, 'create']);
    Route::get('/edit/{id}', [FormController::class, 'edit']);
    Route::post('/edit/{id}', [FormController::class, 'update']);
    Route::get('/delete/{id}', [FormController::class, 'delete']);

    //crud score with relation to student
    Route::post('/create-score-student', [ScoreController::class, 'create']);
    Route::get('/data-student/{id}', [ScoreController::class, 'getStudent']);
    Route::post('/data-student/{id}', [ScoreController::class, 'update']);

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::post('/login', [AuthController::class, 'login']);
