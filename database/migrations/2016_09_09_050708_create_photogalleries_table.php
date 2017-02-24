<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotogalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photogalleries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('album_id')->unsigned()->index();
            $table->integer('image_id')->unsigned()->index();
            $table->tinyInteger('featured');
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
        Schema::drop('photogalleries');
    }
}
