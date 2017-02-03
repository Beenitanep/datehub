<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    public $timestamps = false;

    protected $table = 'about' ;

    protected $fillable = ['title', 'slug', 'image', 'description', 'status', 'created_at', 'updated_at'];

    public function getData(){
    	return AboutUs::all();
    }

    public function addData($data){
    	return AboutUs::create($data);
    }

    public function editData($data, $id){
    	$about = AboutUs::where('id',$id);
    	return $about->update($data);
    }

    public function deleteData($id){
    	$about = AboutUs::find($id);
    	return $about->delete($data);

    }


}
