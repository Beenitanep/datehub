<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;

class FindDateController extends Controller
{
    public function __construct()
    {
    	$this->user = new User;
    }

    public function index()
    {
    	$data['getAllUser'] = $this->user->getAllUser();
    	// return('datelisting');
    	return view('site/date/find', $data);
    }
}
