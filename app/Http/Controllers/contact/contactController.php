<?php

namespace App\Http\Controllers\contact;

use App\Http\Controllers\Controller;
use App\Mail\contactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class contactController extends Controller
{
    //
    public function sendMessage(Request $request)
      { 
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
            'message'=>'required',
        ]);
        
     $mail =   Mail::to('contact@danascholars.com')->send(new contactMail($request->all()));
            // dd($mail);
           return response()->json('successfully sent !!',200);
      }
}
