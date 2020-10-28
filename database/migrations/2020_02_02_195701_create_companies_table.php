<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('image')->nullable();
            $table->string('commercial_register_image')->nullable();
            $table->double('minimum_orders')->default(0);
            $table->enum('admin_agree', array('agree', 'not_agree'))->default('not_agree');
            $table->enum('active', array('active', 'not_active'))->default('not_active');
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
        Schema::dropIfExists('companies');
    }
}
