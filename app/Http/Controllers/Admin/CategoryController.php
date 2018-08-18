<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cnt = 0;
        $categories = Category::orderBy('category_order', 'asc')->get();
        
        return view('admin.category.index', compact('categories', 'cnt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'parent_id'      => 'integer',
            'name'           => 'required|regex:/^[^<>]+$/u|unique:categories,name|max:255',
            'is_visible'     => 'in:null,on',
            'category_order' => 'required|integer|max:255',
        ]);
        
        Category::create([
            'parent_id'      => request('parent_id') ?: null,
            'name'           => request('name'),
            'is_visible'     => request('is_visible'),
            'category_order' => request('category_order'),
        ]);
        
        session()->flash('success', 'The category successfully created!');
        return redirect('/admin/categories');
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
    public function edit(Category $category)
    {
        $categories = Category::get();
        return view('admin.category.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category)
    {
        $this->validate(request(), [
            'parent_id'      => 'integer',
            'name'           => 'required|regex:/^[^<>]+$/u|max:255|unique:categories,name,' . $category->id,
            'is_visible'     => 'in:null,on',
            'category_order' => 'required|integer|max:255',
        ]);
        
        $category->update([
            'parent_id'      => request('parent_id') ?: null,
            'name'           => request('name'),
            'is_visible'     => request('is_visible'),
            'category_order' => request('category_order'),
        ]);
        
        session()->flash('success', 'The category successfully updated!');
        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->deleteProductsImages();
        $category->delete();
        
        session()->flash('success', 'The category successfully deleted!');
        return back();
    }
}
