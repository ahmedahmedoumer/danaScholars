<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\scholars\getScholars;
use App\Http\Controllers\DashBoard\getAskedQuestions;
use App\Http\Controllers\institutions\getInstitutions;



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

  Route::get('/getScholars',[getScholars::class,'getScholars']);
  Route::get('/askedQuestions',[getAskedQuestions::class,'getAskedQuestions']);
  Route::get('/getInstitutions',[getInstitutions::class, 'getInstitutions']);
  Route::get('/getScholars/detail',[getScholars::class,'getScholarsDetail']);

