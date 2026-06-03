<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixturesTable extends Migration
{
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sport')->default('football'); // football, basketball, etc
            $table->string('league'); // Premier League, La Liga, etc
            $table->string('home_team');
            $table->string('away_team');
            $table->timestamp('kickoff_time');
            $table->enum('status', ['upcoming', 'live', 'finished'])->default('upcoming');
            $table->integer('home_score')->nullable();
            $table->integer('away_score')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fixtures');
    }
}
