<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function index() 
    {
        return view('search.index');
    }

    public function result() 
    {
        $products = [];
        $query = trim(request('search'));

        if (! empty($query)) {
            $search = "%" . $query . "%";
            $products = Product::where('name', 'like', $search)->orWhere('price', 'like', $search)->get();
        }

        return back()->with(compact('products', 'query'));
    }
}
