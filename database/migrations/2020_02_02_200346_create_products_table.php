<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('size')->nullable();
//            $table->enum('type', array('normal', 'mosque', 'offer'))->default('normal');
//            $table->double('price')->default(0);
//            $table->double('discount')->default(0);
//            $table->double('after_discount')->default(0);
            $table->tinyInteger('normal')->default(1);
            $table->double('normal_price')->default(0);
            $table->tinyInteger('mosque')->default(0);
            $table->double('mosque_price')->default(0);
            $table->tinyInteger('offer')->default(0);
            $table->double('offer_price')->default(0);
            $table->enum('hide', array('hide', 'not_hide'))->default('not_hide');
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
        Schema::dropIfExists('products');
    }
}
