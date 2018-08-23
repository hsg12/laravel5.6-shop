<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 9;
        $products = Product::where('is_visible', 'on')->latest()->paginate($perPage);
        
        if (! $this->isPaginationPageExistsInUrl($products)) {
            return view('errors.404');
        }
        
        return view('index', compact('products'));
    }
}
