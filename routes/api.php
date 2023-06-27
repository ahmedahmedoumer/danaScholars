<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\scholars\getScholars;
use App\Http\Controllers\dashBoard\getAskedQuestions;
use App\Http\Controllers\institutions\getInstitution;
use App\Http\Controllers\book\bookInformation;




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
  Route::get('/askedQuestions',[getaskedQuestions::class,'asked_questions']);
  Route::get('/getInstitutions',[getInstitution::class, 'get_institution']);
  Route::get('/getScholars/detail',[getScholars::class,'getScholarsDetail']);
  Route::get('/getScholars/book-information',[bookInformation::class,'getBookInformation']);

