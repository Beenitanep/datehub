<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      Admin::insert(['user_name'=>'binitanep','email'=>'binita@ekbana.com','password'=> bcrypt('binita100')]);
    }
}
