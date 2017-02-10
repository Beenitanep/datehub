<?php

namespace App\Http\Controllers\cms\modules\setting;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting;
use Input;
use Validator;
use Redirect;

class settingController extends Controller
{
	public function __construct()
	{
		$this->setting = new Setting;
	}

    public function index(){
    	$data = $this->setting->first();
    	return view('backend/modules/setting/setting-page', compact('data'));
    }

    public function settingPage(){
        //$data['setting'] = Input::all();
    	$data['site_title'] = Input::get('site-title');
    	$data['tagline'] =   Input::get('tagline');
    	$data['site_address'] = Input::get('site-address');
    	$data['email'] = Input::get('email');
    	$data['phone-one'] = Input::get('phone-one');
    	$data['phone-two'] = Input::get('phone-two');
    	$data['mobile-number'] = Input::get('mobile-number');
    	$data['facebook'] = Input::get('facebook');
    	$data['twitter'] = Input::get('twitter');
    	$data['linkedin'] = Input::get('linkedin');
    	$data['youtube'] = Input::get('youtube');
    	$data['instagram'] = Input::get('instagram');
    	$data['skype'] = Input::get('skype');
    	$data['latitude'] = Input::get('latitude');
    	$data['longitude'] = Input::get('longitude');
    	$data['contact-address'] = Input::get('contact-address');
    	$addSetting = $this->setting->settingInfo($data);
    	return Redirect::to(PREFIX . 'setting');
    }


}
