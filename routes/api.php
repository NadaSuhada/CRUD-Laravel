<?php

use App\Http\Controllers\MahasiswaController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//   return $request->user();
//});

Route::get('/mahasiswas', [MahasiswaController::class,'show']);
Route::post('/mahasiswa', [MahasiswaController::class,'store']);
Route::put('/mahasiswa/{id}',[MahasiswaController::class,'update']);
Route::delete('/mahasiswa/{id}',[MahasiswaController::class,'delete']);