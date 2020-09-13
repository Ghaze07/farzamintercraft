<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class ContactFormController extends Controller
{

    function index()
    {
     return view('welcome');
    }

    public function submit(Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $data = array(
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'message'   =>   $request->message
        );

        // Add mail functionality here.
        $status = Mail::to('intercraftsol@gmail.com')->send(new SendMail($data));
        if( empty($status) ) {
            return response()->json($status, 200);
        }else{
            return response()->json($status, 500);
        }     
    }
}