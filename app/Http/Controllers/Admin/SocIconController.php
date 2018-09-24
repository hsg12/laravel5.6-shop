<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use File;

class SocIconController extends Controller
{
    public function index()
    {
        $facebook = '';
        $twitter  = '';
        $google   = '';
        $youtube  = '';
        
        if ( File::exists( Storage::disk('public')->path('soc-icons/facebook.txt') )) {
            $facebook = Storage::get('public/soc-icons/facebook.txt');
        }

        if ( File::exists( Storage::disk('public')->path('soc-icons/twitter.txt') )) {
            $twitter = Storage::get('public/soc-icons/twitter.txt');
        }

        if ( File::exists( Storage::disk('public')->path('soc-icons/google.txt') )) {
            $google = Storage::get('public/soc-icons/google.txt');
        }

        if ( File::exists( Storage::disk('public')->path('soc-icons/youtube.txt') )) {
            $youtube = Storage::get('public/soc-icons/youtube.txt');
        }
        
        return view('admin.soc-icons.index', compact('facebook', 'twitter', 'google', 'youtube'));
    }
    
    public function store()
    {
        $messageStatus = 'error';
        $messageValue  = 'Can not change the soc icons data';

        $this->validate(request(), [
            'facebook' => 'required|regex:/^[^<>]+$/u|max:1000',
            'twitter'  => 'required|regex:/^[^<>]+$/u|max:1000',
            'google'   => 'required|regex:/^[^<>]+$/u|max:1000',
            'youtube'  => 'required|regex:/^[^<>]+$/u|max:1000'
        ]);
        
        $facebookResult = Storage::put('public/soc-icons/facebook.txt', request('facebook'));
        $twitterResult  = Storage::put('public/soc-icons/twitter.txt',  request('twitter'));
        $googleResult   = Storage::put('public/soc-icons/google.txt',   request('google'));
        $youtubeResult  = Storage::put('public/soc-icons/youtube.txt',  request('youtube'));
        
        if ($facebookResult && $twitterResult && $googleResult && $youtubeResult) {
            $messageStatus = 'success';
            $messageValue  = 'The data successfully updated';
        }
        
        session()->flash($messageStatus, $messageValue);
        return back();
    }
}
