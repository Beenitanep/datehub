<?php

namespace App\Http\Controllers\cms\modules\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
	public function __construct(){
		
	}
    
    public function index(){
    	return view('backend/modules/home/home');
    }
}
