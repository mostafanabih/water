<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->enum('type', array('normal', 'mosque', 'offer'))->default('normal');
            $table->integer('quantity')->default(0);
            $table->double('price')->default(0);
            $table->double('discount')->default(0);
            $table->double('after_discount')->default(0);
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
        Schema::dropIfExists('order_products');
    }
}
