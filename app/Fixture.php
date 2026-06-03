<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    protected $table = 'fixtures';
    protected $fillable = ['sport', 'league', 'home_team', 'away_team', 'kickoff_time', 'status', 'home_score', 'away_score'];

    public function odds()
    {
        return $this->hasMany('App\Odds', 'fixture_id');
    }

    public function bets()
    {
        return $this->hasMany('App\Bet', 'fixture_id');
    }
}
