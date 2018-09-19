<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function message()
    {
        $this->validate(request(), [
            'email'   => 'required|email',
            'message' => 'required|regex:/^[^<>]+$/u|max:2000|min:2',
        ]);

        $mail = 'admin@test.com';

        Mail::to($mail)->send(new \App\Mail\ContactUs(request('email'), request('message'))); 

        session()->flash('success', 'Message is send!');
        return back();
    }
}
