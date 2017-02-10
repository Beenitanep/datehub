<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
 
    protected $table = 'setting';
    protected $fillable = ['site_title', 'tagline', 'site_address', 'email', 'phone-one', 'phone-two', 'mobile-number', 'facebook', 'twitter', 'linkedin', 'youtube', 'instagram', 'skype', 'latitude', 'longitude', 'contact-address'];

    public function settingInfo($data){
    	$count = Setting::count();
    	if($count >= 1){
    		$setting = Setting::first();
			$setting->update($data);
	}else{
		return Setting::create($data);
	}
}
}


