<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_post', function (Blueprint $table) {
	        $table->integer('post_id',false,true);
	        $table->integer('category_id',false,true);


	        $table->foreign('post_id')
	              ->references('id')->on('posts')
	              ->onDelete('cascade');

	        $table->foreign('category_id')
	              ->references('id')->on('categories')
	              ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('category_post');
    }
}
