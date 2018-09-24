<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Storage;

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
        $pageCountFromStore = Storage::get('public/per-page/text.txt');
        $perPage = $pageCountFromStore ? $pageCountFromStore : 9;

        $products = Product::where('is_visible', 'on')->latest()->paginate($perPage);
        
        if (! $this->isPaginationPageExistsInUrl($products)) {
            return view('errors.404');
        }
        
        return view('index', compact('products'));
    }
}
