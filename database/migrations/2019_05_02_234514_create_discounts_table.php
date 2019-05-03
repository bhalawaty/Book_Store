<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('value');
            $table->timestamps();
        });

        Schema::create('customer_discount', function (Blueprint $table) {
            $table->integer('customer_id');
            $table->integer('discount_id');


        });


        Schema::create('book_discount', function (Blueprint $table) {
            $table->integer('book_id');
            $table->integer('discount_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
        Schema::dropIfExists('customer_discount');
        Schema::dropIfExists('book_discount');
    }
}
