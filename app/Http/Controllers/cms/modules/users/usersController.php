<?php

namespace App\Http\Controllers\cms\modules\users;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Input;

class usersController extends Controller
{
    public function __construct()
    {
    	$this->user = new User;
    }

    public function index(){
    	return view("backend/modules/users/user-list");
    }

    public function search(){
         $search = Input::get('title');
         dd($search);
    	$data['search'] = $this->user->searchUser($search);
    	return view("backend/modules/users/user-search",$data);
    }
}
