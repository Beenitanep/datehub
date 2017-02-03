<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin;
use Input;
use Redirect;
use Session;

class AdminController extends Controller
{
    public function __construct()
    {
    	$this->admin = new Admin;
    }

    public function getLogin()
    {
    	return view('backend/login/login');
    }

  	public function postLogin(){
  		$username = Input::get('username');
        $password = md5(Input::get('password'));
        $loggedInAdmin = $this->admin->getLogin($username,$password);
        // dd($loggedInAdmin);
        if($loggedInAdmin){
            Session::put('loggedIn','true');
            Session::put('loggedInUser', $loggedInAdmin) ;
            return Redirect::to(PREFIX.'home');
        }

  		else{
  			 return Redirect::to(PREFIX)->with('flash_message', 'Wrong Username and Password.');
  		}

  		    

  	}

  	public function logout()
  	{
  		Session::flush();
  		return Redirect::to(PREFIX);
  	}
}
