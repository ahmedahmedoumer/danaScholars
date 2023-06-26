<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\askedQuestions;

class getAskedQuestions extends Controller
{
    //
    public function getAskedQuestions(Request $request){

        try {
       
            $askedQuestions=askedQuestions::all();
            return response()->json($askedQuestions, 200);

        } catch (\Throwable $th) {
            return response()->json($th, 200);
        }
    }
}
