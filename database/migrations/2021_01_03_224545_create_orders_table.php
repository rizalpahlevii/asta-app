<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->date('order_date');
            $table->integer('normal_price');
            $table->integer('discount');
            $table->integer('voucher_discount');
            $table->integer('total_pay');
            $table->integer('pay');
            $table->unsignedBigInteger('voucher_id')->nullable();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('franchise_id');
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
