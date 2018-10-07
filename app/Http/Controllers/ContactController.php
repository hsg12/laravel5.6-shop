<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Storage;
use File;

class ContactController extends Controller
{
    public function index()
    {
        $location = '';

        if ( File::exists( Storage::disk('public')->path('contact/location.txt') )) {
            $location = Storage::get('public/contact/location.txt');
        }

        return view('contact.index', compact('location'));
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
