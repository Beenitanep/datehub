<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = ['name','first_name','last_name','phone', 'email', 'password','gender','birthday','dating_status','active','confirmation_code','facebook_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function getUserById($userId)
    {
        return User::where('id',$userId)->first();
    }


    public function getAllUser()
    {
        return User::all();
    }

    public function editDate($data, $id)
    {
        $user = User::where('id',$id)->first();
        return $user->update($data);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        return $user->delete();
    }
}
