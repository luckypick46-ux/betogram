<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetsTable extends Migration
{
    public function up()
    {
        Schema::create('bets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('fixture_id')->unsigned();
            $table->string('market'); // 1x2, over_under, etc
            $table->string('selection'); // '1', 'X', '2', etc
            $table->decimal('stake', 10, 2); // bet amount
            $table->decimal('odds', 5, 2);
            $table->decimal('potential_return', 10, 2);
            $table->enum('status', ['pending', 'won', 'lost', 'void'])->default('pending');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('cms_users')->onDelete('cascade');
            $table->foreign('fixture_id')->references('id')->on('fixtures')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bets');
    }
}
