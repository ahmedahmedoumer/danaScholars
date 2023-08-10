<?php

namespace App\Http\Controllers\institutions;

use App\Http\Controllers\Controller;
use App\Models\institution;
use App\Models\scholarsInstitute;
use Illuminate\Http\Request;

class getInstitution extends Controller
{
    //
    public function getAllInstitution(Request $request)
    {
        $page=$request->query('page');
        $perPage=$request->query('perPage');
        $institution=institution::paginate(page:$page,perPage:$perPage);
        return response()->json($institution,200);
    }
    public function getInstitutionDetail(Request $request)
    {
        try{    $pageForStudents=$request->has('pageForStudents')?$request->query('pageForStudents'):1;
                $perPageForStudents=$request->has('perPageForStudents')?$request->query('perPageForStudents'):4;
                $pageForLectures=$request->has('pageForLectures')?$request->query('pageForLectures'):1;
                $perPageForLectures=$request->has('perPageForLectures')?$request->query('perPageForLectures'):5;
                $institutionId=$request->query('institutionId');
                $findInstitution=institution::find($institutionId);
                if(!$findInstitution){
                    return response()->json(null,404);
                }
                
                    $created_at=$findInstitution->created_at;
                    $yrsOfExperiance=$created_at->diffInYears(now());
                    $institute_students=scholarsInstitute::with('scholars')->where('institutions_id',$institutionId)->where('relation_title','student')->paginate(page:$pageForStudents,perPage:$perPageForLectures);
                    $instituteLectures=scholarsInstitute::with('scholars')->where('institutions_id',$institutionId)->where('relation_title','lecture')->paginate(page:$pageForLectures,perPage:$perPageForLectures);
                    $instituteAwards=institution::with('institutionAwards')->whereHas('institutionAwards',function($query) use ($institutionId) {
                                                    $query->where('institutions_id',$institutionId);
                                                   })->count();
                    $findInstitution['no_of_students']=$institute_students->count();
                    $findInstitution['years_of_activity']=$yrsOfExperiance;
                return response()->json([
                                        'institutionDetail'=>$findInstitution,
                                        'yrsOfExperiance'=>$yrsOfExperiance,
                                        'instituteStudents'=>$institute_students,
                                        'instituteLectures'=>$instituteLectures,
                                        'instituteAwards'=>$instituteAwards],
                                        200);
        
            }
           catch (\Throwable $th) {
               return $th;
            }
}}
