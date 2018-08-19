<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'price', 'description', 'image', 'is_visible'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public static function deleteImage($img)
    {
        if ($img) {
            \Storage::delete('public/products/' . $img);
        }
    }
}
