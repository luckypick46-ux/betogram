<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Users', 'user_id');
    }
}
