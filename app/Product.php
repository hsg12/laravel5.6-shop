<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'description', 'image'];

    public static function deleteImage($img)
    {
        if ($img) {
            \Storage::delete('public/products/' . $img);
        }
    }
}
