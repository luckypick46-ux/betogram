<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['pending', 'completed', 'failed', 'cancelled'])->default('pending');
            $table->enum('payment_method', ['stripe', 'paypal'])->nullable();
            $table->string('transaction_id')->nullable();
            $table->json('items')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('cms_users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
