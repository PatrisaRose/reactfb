<?php

use App\Http\Controllers\CopyController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/users', UserController::class); 
Route::apiResource('/copies', CopyController::class);
 Route::apiResource('/books', CopyController::class);

Route::get('/lendings', [LendingController::class, 'index']);
Route::post('/lendings', [LendingController::class, 'store']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/index/{user_id}/{copy_id}/{start}', [LendingController::class, 'show']);
/* Route::put('/index/{user_id}/{copy_id}/{start}', [LendingController::class, 'update']); */
Route::delete('/index/{user_id}/{copy_id}/{start}', [LendingController::class, 'destroy']); 
