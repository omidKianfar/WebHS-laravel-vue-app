<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('contact.create');
    }
    public function postMail(Request $request){
        $data=$request->validate([
            'email'=>'required|Email',
            'subject'=>'required',
            'message'=>'required',
        ]);
        Mail::to('kianfar1989@gmail.com')->send(new ContactMail($data));
            return redirect('/contact');
    }
}
