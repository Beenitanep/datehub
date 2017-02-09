<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_title');
            $table->text('tagline');
            $table->string('site_address');
             $table->string('email')->unique();
            $table->integer('phone-one');
             $table->integer('phone-two');
             $table->integer('mobile-number');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('youtube');
            $table->string('instagram');
            $table->string('skype');
            $table->integer('latitude');
            $table->integer('longitude');
            $table->string('contact-address');
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
        Schema::drop('setting');
    }
}
