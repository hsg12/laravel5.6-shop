<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Storage;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $pageCountFromStore = Storage::get('public/per-category-page/text.txt');
        $perPage = $pageCountFromStore ? $pageCountFromStore : 9;

        $products = Product::where('is_visible', 'on')->where('category_id', $category->id)->latest()->paginate($perPage);
        if (! $this->isPaginationPageExistsInUrl($products)) {
            return view('errors.404');
        }
        return view('categories.index', compact('products', 'category'));
    }
}
