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
            $table->integer('client_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('representative_id')->nullable();
            $table->double('add_value')->default(0);
            $table->double('total')->default(0);
            $table->string('coupon_code')->nullable();
            $table->double('coupon_percentage')->nullable();
            $table->double('net')->default(0);
            $table->string('location')->nullable();
            $table->string('day')->nullable();
            $table->string('time')->nullable();
            $table->enum('payment_way', array('on_deliver', 'visa'))->default('on_deliver');
            $table->longText('visa_response')->nullable();
            $table->enum('status', array('wait', 'process', 'done', 'cancel'))->default('wait');
            $table->string('done_day')->nullable();
            $table->string('done_time')->nullable();
            $table->enum('who_cancel', array('client', 'company', 'representative', 'admin'))->nullable();
            $table->string('cancel_reason')->nullable();
            $table->integer('rate')->nullable();
            $table->double('commission_percentage')->nullable();
            $table->double('commission_money')->nullable();
            $table->enum('commission_payment', array('e_payment', 'bank'))->nullable();
            $table->string('convert_image')->nullable();
            $table->longText('e_response')->nullable();
            $table->enum('admin_commission_agree', array('agree', 'not_agree'))->default('not_agree');
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
