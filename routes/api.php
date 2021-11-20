<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccessController;
use Laravel\Passport\Http\Controllers\PersonalAccessTokenController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/create_token', [AccessController::class, 'store']);
//Route::post('/create_token', ['as' => 'create_token', 'uses' => 'AccessController@store']);

Route::get('/customer',[AccessController::class, 'index'])->middleware('auth:api');

Route::get('/oauth/personal-access-tokens',[PersonalAccessTokenController::class, 'forUser'])->middleware('auth:api');

