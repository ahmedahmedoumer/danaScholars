<?php

namespace App\Http\Controllers\scholars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\scholars;

class getScholars extends Controller
{
    //

     public function getScholars(Request $request){
        try {
            $page=$request->query('page');
            $scholarsData=scholars::paginate(page:$page,perPage:9);
            return response()->json($scholarsData, 200);
        } catch (\Throwable $th) {
            return response()->json($th, 200);
        }
     }
     public function getScholarsDetail(Request $request){
             $scholarsId=$request->query('scholarsId');
             $scholarsData=scholars::with('educationDetail.educationCategories','educationDetail.scholarsInstitute')->find($scholarsId);
             return $scholarsData?  response()->json($scholarsData, 200)
                                 :  response()->json($scholarsData, 200);
     }

}
