<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['user_id', 'total_amount', 'status', 'payment_method', 'transaction_id', 'items'];
    protected $casts = ['items' => 'array'];

    public function user()
    {
        return $this->belongsTo('App\Users', 'user_id');
    }
}
