<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Category;
use Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 5;
        $products = Product::latest()->paginate($perPage);
        $cnt = ($products->currentPage() - 1) * $perPage;

        if (! $this->isPaginationPageExistsInUrl($products)) {
            return view('errors.404');
        }

        return view('admin.product.index', compact('products', 'cnt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // In this 2 lines we are looking categories which do not have parents
        $val = Category::whereNotNull('parent_id')->pluck('parent_id');
        $categories = Category::select()->whereNotIn('id', $val)->get();

        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $fileName = basename($request->file('image')->store('public/products')); // save in the file system
            $requestData['image'] = $fileName; // for save in the database
        }

        Product::create($requestData);

        session()->flash('success', 'Product successfully created!');
        return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $val = Category::whereNotNull('parent_id')->pluck('parent_id');
        $categories = Category::select()->whereNotIn('id', $val)->get();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product)
    {
        $this->validate(request(), [
            'category_id' => 'required|integer',
            'name'        => 'required|regex:/^[^<>]+$/u|max:190|unique:products,name,' . $product->id,
            'price'       => 'numeric|min:0|regex:/^\d*(\.\d{1,2})?$/',
            'description' => 'required|regex:/^[^<>]+$/u',
            'image'       => 'image|max:2000',
            'is_visible'  => 'in:null,on',
        ]);

        $requestData = request()->all();

        if (request()->hasFile('image')) {
            Storage::delete('public/products/' . $product->image);
            
            $filePath  = basename(request('image')->store('public/products'));
            $product->image = $filePath;
        }

        $product->name        = request('name');
        $product->description = request('description');
        $product->price       = request('price');
        $product->category_id = request('category_id');
        $product->is_visible  = request('is_visible');

        $product->update();

        session()->flash('success', 'Product successfully updated!');
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        
        Product::deleteImage($product->image);
        
        session()->flash('success', 'Product successfully deleted!');
        return redirect('admin/products');
    }
}
