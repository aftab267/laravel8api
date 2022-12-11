<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;

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
//Get Route for fetch user
Route::get('/users/{id?}',[UserApiController::class,'showuser']);
//post Route for get user
Route::post('/add-user',[UserApiController::class,'adduser']);
//post Route for get Multiple user
Route::post('/add-multiple-user',[UserApiController::class,'addmultipleuser']);
