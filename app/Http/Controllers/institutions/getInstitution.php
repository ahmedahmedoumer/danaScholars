<?php

namespace App\Http\Controllers\institutions;

use App\Http\Controllers\Controller;
use App\Models\institution;
use Illuminate\Http\Request;

class getInstitution extends Controller
{
    //
    public function getAllInstitution()
    {
        $institution=institution::all();
        return response()->json($institution,200);
    }
    public function getInstitutionDetail(Request $request)
    {
        try{
                $institutionId=$request->query('institutionId');
                $findInstitution=institution::find($institutionId);
                if($findInstitution){
                    $created_at=$findInstitution->created_at;
                    $yrsOfExperiance=$created_at->diffInYears(now());
                    $instituteStudents=institution::with('instituteStudents')->whereHas('instituteStudents',function($query){
                                                    $query->where('relation_title','student');
                                                    })->get();
                    $instituteLectures=institution::with('instituteStudents')->whereHas('instituteStudents',function($query){
                                                    $query->where('relation_title','lecture');
                                                    })->get();
                    $instituteAwards=institution::with('institutionAwards')->whereHas('institutionAwards',function($query) use ($institutionId) {
                                                    $query->where('institutions_id',$institutionId);
                                                   })->count();
                }
                return response()->json(['yrsOfExperiance'=>$yrsOfExperiance,
                                        'instituteStudents'=>$instituteStudents,
                                        'instituteLectures'=>$instituteLectures,
                                        'instituteAwards'=>$instituteAwards],
                                        200);
        
            }
           catch (\Throwable $th) {
               return $th;
            }
}}
