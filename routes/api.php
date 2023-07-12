<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\scholars\getScholars;
use App\Http\Controllers\dashBoard\getAskedQuestions;
use App\Http\Controllers\institutions\getInstitution;
use App\Http\Controllers\book\bookInformation;
use App\Http\Controllers\contact\contactController;
use App\Http\Controllers\storage\storageController;

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
  Route::get('/scholars/institute-information',[getScholars::class,'scholarsInstitute']);

  Route::get('/scholars/education-information',[getScholars::class,'getEducationInformation']);
  Route::get('/scholars/book-information',[bookInformation::class,'getBookInformation']);


  Route::get('/getInstitutions',[getInstitution::class, 'getAllInstitution']);
  Route::get('/institution-detail',[getInstitution::class,'getInstitutionDetail']);

  Route::get('/download-book/{fileName}',[bookInformation::class,'downloadBooks']);
  Route::get('/get-books',[bookInformation::class,'getAllBooks']);
  Route::post('/contact',[contactController::class,'sendMessage'])->name('contact');
  
  Route::get('/all-books',[bookInformation::class,'getAllBooks']);
  Route::get('/get-books-detail',[bookInformation::class,'getBookDetail']);
  Route::get('/get-image-retrival/{fileName}',[storageController::class,'imageRetrive']);

  Route::get('/books/randomSelect',[bookInformation::class,'randomBooksSelector']);
  Route::get('/scholars/randomSelect',[getScholars::class,'randomScholarsSelector']);
  Route::get('/search-scholars',[getScholars::class,'searchScholars']);

