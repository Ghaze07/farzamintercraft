<?php
//email sending code

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use Session;

class PagesController extends Controller
{
    public function getContact() {
		return view('welcome');
    }
    
    public function postContact(Request $request) {
        
        $data = $this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
            'msg' => 'min:10']);
        //dd($data);
            
        
        Mail::send('emails.contactus', $data, function($m) use ($data){
                $m->from($data['email']);
                $m->to('ghaziislam3@gmail.com');
                $m->subject($data['subject']);
            });
          
            Session::flash('success', 'Your Email has been Sent!');
    
            return view('submission');
        }
    


    }



