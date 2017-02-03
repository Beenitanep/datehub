<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('about_me');
            $table->integer('age');
            $table->integer('date_of_birth');
            $table->text('my_first_ideal_date');
            $table->enum('seeking',array('Any','Male','Female'));
            $table->string('permanant_address');
            $table->string('temporary_address');
            $table->string('country');
            $table->string('postal_code');
            $table->text('interest');
            $table->text('future_plan');
            $table->integer('province');
            $table->string('height');
            $table->integer('height_feet');
            $table->float('height_inch');
            $table->string('religion');
            $table->string('ethnicity');
            $table->string('children');
            $table->string('pets');
            $table->string('education');
            $table->string('self_confidence');
            $table->string('occupation');
            $table->enum('marital_status',array('Never Married','Widow/Widower','Currently Separated','Divorced'));
            $table->string('mother_language');
            $table->string('second_language');
            $table->enum('ambition',array('High','Medium','Low','Don’t Know'));
            $table->string('user_wants_children');
            $table->string('smokes');
            $table->string('use_drugs');
            $table->string('drink');
            $table->enum('users_with_children',array('Yes','No'));
            $table->string('hair_color');
            $table->string('star_sign');
            $table->string('eye_color');
            $table->string('body_type');
            $table->string('income');
            $table->string('personality');
            $table->string('short quotation');
            $table->enum('vechile_type',array('Cycle','Bike','Car'));
            $table->string('longest_relationship');
            $table->enum('want_partner_who_take_drink',array('yes','No','No problem if they take'));
            $table->enum('want_partner_who_take_somke',array('yes','No','No problem if they take'));
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
        Schema::drop('profile');
    }
}
