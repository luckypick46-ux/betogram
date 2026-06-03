<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOddsTable extends Migration
{
    public function up()
    {
        Schema::create('odds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fixture_id')->unsigned();
            $table->enum('market', ['1x2', 'over_under', 'btts', 'handicap'])->default('1x2'); // 1x2 = match outcome
            $table->string('selection'); // '1', 'X', '2' for 1x2, 'Over 2.5', 'Under 2.5', etc
            $table->decimal('odds_value', 5, 2); // e.g., 1.85, 2.10
            $table->timestamps();
            
            $table->foreign('fixture_id')->references('id')->on('fixtures')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('odds');
    }
}
