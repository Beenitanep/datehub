<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Hash;
use Auth;

class Admin extends Authenticatable
{
    Protected $table = 'admin_login';

    protected $fillable = ['full_name', 'user_name', 'email', 'password', 'permission'];


    public function getLogin($username,$password){
    	$hashpswd = bcrypt($password);
    	return Admin::where('user_name',$username)->where('password',$hashpswd)->first();
    }

    public function getById($id){
    	return Admin::where('id',$id)->first();
    }

    


}
