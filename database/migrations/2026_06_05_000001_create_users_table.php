<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('age_group')->nullable();
            $table->string('password');
            $table->string('gender')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('country_code')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('currency')->nullable();
            $table->string('city')->nullable();
            $table->string('activation_code')->nullable();
            $table->string('random_code')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->dateTime('creation_date')->nullable();
            $table->dateTime('updation_date')->nullable();
            $table->integer('user_type')->nullable();
            $table->integer('roles_id')->nullable();
            $table->integer('social_media_id')->nullable();
            $table->tinyInteger('subscription_type')->default(0);
            $table->tinyInteger('forgot_pass')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
