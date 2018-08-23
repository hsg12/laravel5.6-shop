<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $perPage = 9;
        $products = Product::where('is_visible', 'on')->where('category_id', $category->id)->paginate($perPage);
        if (! $this->isPaginationPageExistsInUrl($products)) {
            return view('errors.404');
        }
        return view('categories.index', compact('products', 'category'));
    }
}
