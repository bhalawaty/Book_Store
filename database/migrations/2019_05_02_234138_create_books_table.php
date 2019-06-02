<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img', 255)->default('');
            $table->string('description', 255);
            $table->integer('user_id');
            $table->string('author_name');
            $table->string('publisher_name');
            $table->string('title');
            $table->date('publication_date');
            $table->integer('edition');
            $table->integer('available_quantity');
            $table->string('price');
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
        Schema::dropIfExists('books');
    }
}
