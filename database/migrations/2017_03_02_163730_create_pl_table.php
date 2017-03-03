<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products-lists', function (Blueprint $table) {
            $table->integer('pid')->unsigned();
            $table->integer('lid')->unsigned();
            $table->primary(['pid', 'lid']);
            $table->timestamps();
        });
        Schema::table('products-lists', function (Blueprint $table) {
//            $table->foreign('pid')->references('pid')->on('products')->onDelete('cascade');
            $table->foreign('pid')->references('pid')->on('products');
//            $table->foreign('lid')->references('lid')->on('lists')->onDelete('cascade');
            $table->foreign('lid')->references('lid')->on('lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products-lists');
    }
}
