<?php

namespace App\Http\Controllers\scholars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\scholars;
use App\Models\institution;
use App\Models\books;
use DB;
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
          $searchValue=$request->query('searchValue');
          $scholarsData=scholars::select('id','fname as result','description','photo',DB::raw('"scholars" as type'))
                                 ->where('fname','LIKE','%'.$searchValue.'%')
                                 ->orWhere('lname','LIKE','%'.$searchValue.'%')
                                 ->orWhere('mothers_name','LIKE','%'.$searchValue.'%')
                                 ->orWhere('family','LIKE','%'.$searchValue.'%')->get();
          $bookData=books::select('id','book_name as result','img','description',  DB::raw('"books" as type'))
                           ->where('book_name','LIKE','%'.$searchValue.'%')
                           ->orWhere('description','LIKE','%'.$searchValue.'%')->get();
          $institutData=institution::select('id','name as result','description','photo',
                                     DB::raw("'institution' as type"))
                                    ->where('name','LIKE','%'.$searchValue.'%')
                                    ->orWhere('description','LIKE','%'.$searchValue.'%')
                                    ->orWhere('location','LIKE','%'.$searchValue.'%')->get();
                                    
         
$mergedResults = collect();

$maxCount = max($scholarsData->count(), $bookData->count(), $institutData->count());

for ($i = 0; $i < $maxCount; $i++) {
    if ($i < $scholarsData->count()) {
        $mergedResults->push($scholarsData[$i]);
    }
    if ($i < $bookData->count()) {
        $mergedResults->push($bookData[$i]);
    }
    if ($i < $institutData->count()) {
        $mergedResults->push($institutData[$i]);
    }
}
             return ($mergedResults->count())!==0 ?  response()->json($mergedResults, 200)
                              :  response()->json('notFound',404);
        }
}
