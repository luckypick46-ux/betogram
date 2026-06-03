<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    protected $table = 'bets';
    protected $fillable = ['user_id', 'fixture_id', 'market', 'selection', 'stake', 'odds', 'potential_return', 'status'];

    public function user()
    {
        return $this->belongsTo('App\Users', 'user_id');
    }

    public function fixture()
    {
        return $this->belongsTo('App\Fixture', 'fixture_id');
    }
}
