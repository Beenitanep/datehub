<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $timestamps = false;
    protected $table = 'sliders';
    protected $fillable = ['title', 'url', 'image', 'status'];


    public function getAllData()
    {
    	// return Slider::all();
           return Slider::paginate(15);
    }

    public function  getDataById($id)
    {
 		return Slider::where('id', $id)->first();
    }

    public function addData($data)
    {
    	return Slider::create($data);
    }

   
     public function editData($data, $id) {
        $slider = Slider::find($id);
        $slider->update($data);
    }

    
    public function deleteData($id) {
        $slider = Slider::find($id);
        return $slider->delete();
    }

    public function getHomePageSlider()
    {
    	return Slider::where('status','Publish')->get();
    }

}
