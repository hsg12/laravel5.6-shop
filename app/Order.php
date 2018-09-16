<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'products', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Accessor for field status
    
    public function getStatusAttribute($value) {
        return ucfirst($value);
    }
}
