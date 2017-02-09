<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Admin;
use Input;
use Redirect;
use Session;
use Hash;
use Auth;
class AdminController extends Controller
{
    // public function __construct()
    // {
    // 	$this->admin = new Admin;
    //   $this->middleware('auth:admin');
    // }

    public function getLogin()
    {
     //dd(Hash::make('beenita'));
    	return view('backend/login/login');
    }

  	public function postLogin(){
  		$username = Input::get('username');
      $password = Input::get('password');
      //$password = md5(Input::get('password'));
        //$password = Hash::make(Input::get('password'));
        //$password = bcrypt(Input::get('password'));
      //dd($user = Auth::user());
      //dd($password);
        $loggedInAdmin = Auth::guard('admin')->attempt([ 'user_name' => $username, 'password' => $password ]);
//$loggedInAdmin = Auth::guard('admin')->attempt([ 'user_name' => $username, 'password' => $password ]);
       //dd($loggedInAdmin);
        if($loggedInAdmin){
            Session::put('loggedIn','true');
            Session::put('loggedInUser', Auth::guard('admin')->user()) ;
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
