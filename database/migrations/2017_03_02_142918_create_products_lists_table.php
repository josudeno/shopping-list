<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->increments('lid')->unsigned();
            $table->integer('uid_created')->unsigned();
            $table->foreign('uid_created')->references('uid')->on('users')->onDelete('cascade');
            $table->string('name')->notNullable();
            $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->integer('pid')->unsigned()->unique();
            $table->string('name')->notNullable();
            $table->string('api_name');
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
        Schema::dropIfExists('lists', function(Blueprint $table) {
            $table->dropForeign('lists_uid_created_foreign');
            $table->dropColumn('uid_created');
        });
        Schema::dropIfExists('products');
    }
}
