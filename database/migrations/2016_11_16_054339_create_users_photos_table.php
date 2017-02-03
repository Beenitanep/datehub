<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_photos_table', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('image');
            $table->enum('profile_picture',array('Yes','No'));
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
        Schema::drop('users_photos_table');
    }
}
