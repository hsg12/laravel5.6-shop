<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'products', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
