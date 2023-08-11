<?php

namespace App\Http\Controllers\storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class storageController extends Controller
{
    //

    public function imageRetrive($fileName)
     {
        // $filePath=storage_path('app/public/images/'.$fileName);
        //  if(!File::exists($filePath))
        //  {
        //    abort(404); 
        //  }
        //  $file=File::get($filePath);
        //  $fileType=File::mimeType($filePath);
         return response('content-type',200);        
     }
}
