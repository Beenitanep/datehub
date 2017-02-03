<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('forget_password');
            $table->enum('gender',array('Male','Female'));
            $table->date('birthday');
            $table->enum('dating_status',array('Single','In a Relationship'));
            $table->tinyInteger('active');
            $table->text('confirmation_code');
            $table->string('facebook_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
