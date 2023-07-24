<?php

namespace App\Http\Controllers\scholars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\scholars;
use App\Models\scholarsInstitute;
use App\Models\educationDetails;

class getScholars extends Controller
{
    //

     public function getScholars(Request $request){
        try {
            $page=$request->query('page');
            $perPage=$request->query('perPage');
            $scholarsData=scholars::paginate(page:$page,perPage:$perPage);
            return response()->json($scholarsData, 200);
        } catch (\Throwable $th) {
            return response()->json($th, 200);
        }
     }
     public function getScholarsDetail(Request $request){
             $scholarsId=$request->query('scholarsId');
             $scholarsData=scholars::with('educationDetail.institution')->findOrFail($scholarsId);
             return $scholarsData?  response()->json($scholarsData, 200)
                                 :  response()->json(null,404);
     }
     public function scholarsInstitute(Request $request)
       {
         $scholarsId=$request->query('scholarsId');
         $data=scholarsInstitute::with('institute.institutionAwards')->where('scholars_id',$scholarsId)->get();
         return $data->count()!==0 ? response()->json($data,200)
                      : response()->json(null,404);
       } 
     public function getEducationInformation(Request $request)
        {
            $scholarsId=$request->query('scholarsId');
            $scholarsEducation=educationDetails::with('educationCategories')->where('scholars_id',$scholarsId)->get();
            return $scholarsEducation->count()!==0 ? response()->json($scholarsEducation,200)
                      : response()->json(null,404);
        }
        public function randomScholarsSelector()
        {
           return response()->json(scholars::all()->random(3), 200);
        }
        public function searchScholars(Request $request)
        {
          $scholarsName=$request->query('scholarsName');
          $scholars=scholars::where('fname','LIKE','%'.$scholarsName.'%')
                            ->orWhere('lname','LIKE','%'.$scholarsName.'%')
                            ->get();
             return ($scholars->count())!==0 ?  response()->json($scholars, 200)
                              :  response()->json('notFound',404);
        }

}
