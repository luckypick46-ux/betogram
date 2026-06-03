<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odds extends Model
{
    protected $table = 'odds';
    protected $fillable = ['fixture_id', 'market', 'selection', 'odds_value'];

    public function fixture()
    {
        return $this->belongsTo('App\Fixture', 'fixture_id');
    }
}
