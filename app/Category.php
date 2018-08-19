<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['parent_id', 'name', 'is_visible', 'category_order'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parent()
    {
        $parent = $this->where('id', $this->parent_id)->pluck('name')->shift();
        if (! $parent) {
            return 'Has no parent';
        }
        
        return $parent;
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
    
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    
    public static function getCategories()
    {
        return static::where('parent_id', null)->where('is_visible', 'on')->orderBy('category_order', 'asc')->get();
    }

    protected function getNestedCategories()
    {
        $result = [];
        
        $categories = $this->where('parent_id', $this->id)->get();
        
        if (! empty($categories)) {
            foreach ($categories as $category) {
                if (!empty($category)) {
                    $result[] = $category;
                    $result[] = $category->getNestedCategories();
                }
            }
        }
        return $result;
    }

    protected function deleteAllNestedCategoriesProductsImages()
    {
        $nestedCategories = $this->getNestedCategories();
        
        array_walk_recursive($nestedCategories, function($value) {
            $products = Product::where('category_id', $value->id)->get();
             
            if ($products && count($products) > 0) {
                array_walk_recursive($products, function($product){
                    Product::deleteImage($product->image);
                });
            }
        });
    }
    
    protected function deleteCategoryProductsImages()
    {
        $products = $this->products()->get();
        
        foreach ($products as $product) {          
            Product::deleteImage($product->image);
        }
    }
    
    public function deleteProductsImages()
    {
        $this->deleteCategoryProductsImages();
        $this->deleteAllNestedCategoriesProductsImages();
    }
}
