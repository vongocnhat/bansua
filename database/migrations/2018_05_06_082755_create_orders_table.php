<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email', 191)->nullable();
            $table->string('phone', 20)->nullable();
            $table->boolean('gender')->nullable();
            $table->date('birthday')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('method');
            $table->unsignedInteger('total_quantity');
            $table->unsignedInteger('total_price');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
