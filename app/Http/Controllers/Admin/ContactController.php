<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        return view('admin.contact.index', compact('location'));
    }
    
    public function store()
    {
        $messageStatus = 'error';
        $messageValue  = 'Can not change the location data';

        $this->validate(request(), [
            'location' => 'required|regex:/(<iframe>)?[\w\'\"\= ]*(<\/iframe>)/ui',
        ]);

        $locationResult = Storage::put('public/contact/location.txt', request('location'));
        
        if ($locationResult) {
            $messageStatus = 'success';
            $messageValue  = 'The data successfully updated';
        }
        
        session()->flash($messageStatus, $messageValue);
        return back();
    }
}
