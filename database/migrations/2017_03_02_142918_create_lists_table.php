<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->increments('lid');
            $table->integer('uid_created')->unsigned();
            $table->foreign('uid_created')->references('uid')->on('users');
            $table->string('name');
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
//            $table->dropIndex('lists_uid_created_index');
            $table->dropColumn('uid_created');
        });
    }
}
