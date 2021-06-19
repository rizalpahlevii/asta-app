<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('unit', ['pcs', 'gram']);
            $table->date('expired');
            $table->integer('amount');
            $table->text('information');
            $table->integer('deductions_per_transaction');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('franchise_id');
            $table->json('incoming_history')->nullable();
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
        Schema::dropIfExists('raw_materials');
    }
}
