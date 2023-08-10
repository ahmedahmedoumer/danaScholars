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
 # to get asked questions and their apropriate answers

  Route::get('/getScholars',[getScholars::class,'getScholars']);
  # to get list of all scholars with general information or basic information 

  Route::get('/getScholars/detail',[getScholars::class,'getScholarsDetail']);
  # to get single scholar's data with his basic info(general information) 
  # so the requet url must attach the scholars unique id in query  with variable($scholarsId)

  Route::get('/scholars/institute-information',[getScholars::class,'scholarsInstitute']);
  # to get the single scholar's institution data 
  # the request url must attach scholar's unique id with query using variable($scholarsId)

  Route::get('/scholars/education-information',[getScholars::class,'getEducationInformation']);
  #  to get single scholar's education information 
  #  the request url must attach the scholar's unique id with query using variable($scholarsId)

  Route::get('/scholars/book-information',[bookInformation::class,'getBookInformation']);
  #  to get single scholar's book information 
  #  the request url must attach the scholar's unique id with query using variable($scholarsId)


  Route::get('/getInstitutions',[getInstitution::class, 'getAllInstitution']);
  # to get all list of institutions with out any detail 

  Route::get('/institution-detail',[getInstitution::class,'getInstitutionDetail']);
  #  to get single institution data with detail information, institution years of experiance 
  #  with institution students,institution lectures,institution awards
  #  So the request url must attach the institution's unique id with query  using variable($institutionId)

  Route::get('/download-book/{fileName}',[bookInformation::class,'downloadBooks']);
  #  to download the book, so the request url must attach the book name 
  #  at the end of url after forward slash like fileName(/download-book/{fileName})

  Route::get('/get-books',[bookInformation::class,'getAllBooks']);
  #  to get the detail of the clicked book data 
  Route::post('/contact',[contactController::class,'sendMessage'])->name('contact');
   #  to accept and handle the contact form data 
  
  Route::get('/all-books',[bookInformation::class,'getAllBooks']);
   #  to get all list of books 

  Route::get('/get-books-detail',[bookInformation::class,'getBookDetail']);
   #  to get the detail of the clicked book data 
   #   so the request url must attach the book's unique id with query using variable(bookId)



  Route::get('/books/randomSelect',[bookInformation::class,'randomBooksSelector']);
  # to get books by random selection to display on " you may Like " at books page 

  Route::get('/scholars/randomSelect',[getScholars::class,'randomScholarsSelector']);
  # to get list of scholars by using random selection to display for home page " popular sheikh " 

  Route::get('/search-scholars',[getScholars::class,'searchScholars']);
  # to search the scholars by first name and last name 
  #  so the request url must attach the data with query using variable ($scholarsName)

