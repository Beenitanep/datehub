<?php

namespace App\Http\Controllers\cms\modules\menu;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\menu;
use Input;
use Redirect;
use Validator;

class menuController extends Controller
{
	public function __construct()
	{
		$this->menu = new menu();
	}

    public function index()
    {
    	$data['menuData'] = $this->menu->getAllData();
    	return view('backend/modules/menu/menu-list', $data);
    }

    public function add()
    {
    	
    	return view('backend/modules/menu/menu-add');
    }

    public function validationcheck($data){
    return Validator::make($data,[
        'name' => 'required',
        ]);

   }

   public function addPost()
    {
        $validator = $this->validationcheck(Input::all());
        if($validator->fails()){
            return Redirect::back()->withErrors($validator->errors())->withInput();
        }else{
        $data['name'] = Input::get('name');
        $data['slug'] = Input::get('slug');
        $data['parent_id'] = Input::get('parentid');
        $data['position'] = Input::get('position');
        $data['status'] = Input::get('status');
        $adddata =  $this->menu-> addData($data);
        return Redirect::to(PREFIX . 'menu');
    }
    }

     public function edit()
    {
        $id = Input::get('id');
         $data['editData'] = $this->menu->getDataById($id);
      if(empty($data['editData'])){
        return Redirect::to(PREFIX . 'menu');
      }
        return view("backend/modules/menu/menu-edit", $data);
    }

    public function editPost()
    {
      //dd(Input::all());
      // $validator = $this->validationcheck(Input::all());
      //  if($validator->fails()){
      //       return Redirect::back()->withErrors($validator->errors())->withInput();
        //}else{
        $updatedData['name'] = Input::get('name');
        $updatedData['slug'] = Input::get('slug'); 
        $updatedData['parent_id'] = Input::get('parentid');
        $updatedData['position'] = Input::get('position');
        $updatedData['status'] = Input::get('status');
        $id = Input::get('id');
        $editdata = $this->menu->editData($updatedData, $id);
        return Redirect::to(PREFIX . 'menu');
    //}
    }

     public function delete()
    {
        $id = Input::get('id');
        $deletedata = $this->menu->deleteData($id);
        return Redirect::back();
    }

    public function publish(){
        $id = Input::get('id');
        $updatedData['status'] = 'publish';
        //dd( $updatedData['status']);
        $this->menu->editData($updatedData, $id);
        return Redirect::back();
    }

    public function unPublish(){
        $id = Input::get('id');
        $updatedData['status'] = 'unpublish';
        $this->menu->editData($updatedData, $id);
        return Redirect::back();
    }


}
