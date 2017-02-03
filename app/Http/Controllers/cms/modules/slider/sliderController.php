<?php

namespace App\Http\Controllers\cms\modules\slider;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slider;
use Input;
use Redirect;
use Validator;
use File;

class sliderController extends Controller
{
    public function __construct()
    {
    	$this->slider = new Slider;
    }

    public function index()
    {
    	$data['sliderData'] = $this->slider->getAllData();
    	return view('backend/modules/slider/slider-list', $data);
    }

    public function add()
    {
        return view('backend/modules/slider/slider-add');
    }
  
   public function validationcheck($data){
    return Validator::make($data,[
        'title' => 'required|max:255',
        'image' => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg',
        ]);

   }

   public function validationcheckUpdate($data){
    return Validator::make($data,[
        'title' => 'required',
        'image' => 'image|mimes:jpeg,jpg,png,bmp,gif,svg',
        ]);

   }
    public function addPost()
    {
        $validator = $this->validationcheck(Input::all());
        if($validator->fails()){
            return Redirect::back()->withErrors($validator->errors())->withInput();
        }else{
            if(Input::hasFile('image'))
            {
                $destinationpath = 'uploads/slider';
                $extension = Input::file('image')->getClientOriginalExtension();
                $originalName = Input::file('image')->getClientOriginalName();
                $data['image'] = date('ymd') . str_replace(" ", "_", $originalName);
                Input::file('image')->move($destinationpath, $data['image']);
            }
        $data['title'] = Input::get('title');
        $data['url'] = Input::get('url');
        $data['status'] = Input::get('status');
         $adddata =  $this->slider->addData($data);
        return Redirect::to(PREFIX . 'slider');
    }
    }
    
    public function edit()
    {
        $id = Input::get('id');
         $data['editData'] = $this->slider->getDataById($id);
      if(empty($data['editData'])){
        return Redirect::to(PREFIX . 'slider');
      }
        return view("backend/modules/slider/slider-edit", $data);
    }

    public function editPost()
    {
      //dd(Input::all());
      $validator = $this->validationcheckUpdate(Input::all());
       if($validator->fails()){
            return Redirect::back()->withErrors($validator->errors())->withInput();
        }else{
            if(Input::hasFile('image'))
            {
                 $destinationpath = 'uploads/slider';
               $extension = Input::file('image')->getClientOriginalExtension();
                $originalName = Input::file('image')->getClientOriginalName();
                 $updatedData['image'] = date('ymd') . str_replace(" ", "_", $originalName);
                Input::file('image')->move($destinationpath, $updatedData['image']);
            }
        //dd(Input::get('image'));
        $updatedData['title'] = Input::get('title');
        $updatedData['url'] = Input::get('url');
        $updatedData['status'] = Input::get('status');
        $id = Input::get('id');
        $editdata = $this->slider->editData($updatedData, $id);
        return Redirect::to(PREFIX . 'slider');
    }
    }


    public function delete()
    {
        $id = Input::get('id');
        $sliderData = $this->slider->getDataById($id);
         if ($sliderData->image != '' && file_exists("uploads/slider/" . $sliderData->image)) {
            File::delete("uploads/slider/" . $sliderData->image);
        }

        $deletedata = $this->slider->deleteData($id);
        return Redirect::back();
    }

    public function deleteImage()
    {
        $id = Input::get('id');
        $sliderData = $this->slider->getDataById($id);
        if ($sliderData->image != '' && file_exists("uploads/slider/" . $sliderData->image)) {
            File::delete("uploads/slider/" . $sliderData->image);
        }
        $updatedData['image'] = '';
        $updatedData = $this->slider->editData($updatedData, $id);
        return Redirect::back();
    }

    public function publish(){
        $id = Input::get('id');
        $updatedData['status'] = 'Publish';
        $this->slider->editData($updatedData, $id);
        return Redirect::back();
    }

    public function unPublish(){
        $id = Input::get('id');
        $updatedData['status'] = 'Unpublish';
        $this->slider->editData($updatedData, $id);
        return Redirect::back();
    }




}
