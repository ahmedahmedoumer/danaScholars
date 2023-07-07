<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\scholars\getScholars;
use App\Http\Controllers\dashBoard\getAskedQuestions;
use App\Http\Controllers\institutions\getInstitution;
use App\Http\Controllers\book\bookInformation;
use App\Http\Controllers\contact\contactController;

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
  Route::get('/askedQuestions',[getaskedQuestions::class,'asked_questions']);
  Route::get('/getScholars',[getScholars::class,'getScholars']);
  Route::get('/getScholars/detail',[getScholars::class,'getScholarsDetail']);
  Route::get('/getScholars/book-information',[bookInformation::class,'getBookInformation']);
  Route::get('/getInstitutions',[getInstitution::class, 'getAllInstitution']);
  Route::get('/institution-detail',[getInstitution::class,'getInstitutionDetail']);
  Route::get('/download-book/{fileName}',[bookInformation::class,'downloadBooks']);
  Route::get('/books',[bookInformation::class,'getAllBooks'])->name('getAllBooks');
  Route::get('/get-book',[bookInformation::class,'getBookDetail'])->name('getBook/detail');
  Route::post('/contact',[contactController::class,'sendMessage'])->name('contact');
