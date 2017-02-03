<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    Protected $table = 'admin_login';

    protected $fillable = ['full_name', 'user_name', 'email', 'password', 'permission'];

    public function getLogin($username,$password){
    	return Admin::where('user_name',$username)->where('password',$password)->first();
    }
}
