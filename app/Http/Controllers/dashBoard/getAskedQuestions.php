<?php

namespace App\Http\Controllers\dashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\askedQuestions;

class getaskedQuestions extends Controller
{
    //
    public function asked_questions(){
        try {
            $askedQuestions=askedQuestions::all();
            return response()->json($askedQuestions, 200);
        } catch (\Throwable $th) {
            return response()->json($th, 200);
        }
    }
}
