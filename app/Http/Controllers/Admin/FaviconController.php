<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaviconController extends Controller
{
    public function index()
    {
        return view('admin.favicon.index');
    }

    public function store() 
    {
        $this->validate(request(), [
            'favicon' => 'required',
        ]);

        $messageStatus = 'error';
        $messageValue  = 'Can not change the favicon';
    
        if (request()->hasFile('favicon')) {
            $img = 'favicon.';
            $ext = request('favicon')->getClientOriginalExtension();

            if ($ext === 'ico') {
                \Storage::deleteDirectory('public/favicon');

                $res = request('favicon')->storeAs('public/favicon', $img . $ext);
            
                if ($res) {
                    $messageStatus = 'success';
                    $messageValue  = 'The favicon is changed!';
                }
            }
        }

        session()->flash($messageStatus, $messageValue);
        
        return back();
    }
}
