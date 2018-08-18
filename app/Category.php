<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['parent_id', 'name', 'is_visible', 'category_order'];

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
}
