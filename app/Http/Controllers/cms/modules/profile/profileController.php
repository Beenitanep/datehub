<?php

namespace App\Http\Controllers\cms\modules\profile;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Admin;
use Auth;

class profileController extends Controller
{

	public function __construct()
	{
		$this->admin = new Admin;
	}

    public function index($id)
    {
    	$id = auth::guard('admin')->user()->id;
    	//$data['profile'] = $this->admin->getById($id);
    	$profile = $this->admin->getById($id);
    	return view("backend/modules/users/user-profileshow");

    }
}
