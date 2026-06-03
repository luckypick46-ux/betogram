<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['title', 'price', 'description', 'image', 'stock'];

    public function cartItems()
    {
        return $this->hasMany('App\Cart', 'product_id');
    }
}
