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

            /* This code will search from two tables (products and categories) */
            $products = Product::where('name', 'like', $search)
                ->orWhere('price', 'like', $search)
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })
               ->get();
        }

        return back()->with(compact('products', 'query'));
    }
}
