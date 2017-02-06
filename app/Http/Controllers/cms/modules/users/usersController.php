<?php

namespace App\Http\Controllers\cms\modules\users;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Input;
use Redirect;
use Validator;

class usersController extends Controller
{
    public function __construct()
    {
    	$this->user = new User;
    }

    public function index()
    {
        $data['userData'] = $this->user->getAllUser();
        return view('backend/modules/users/user-list',$data);
    }

    public function  add(){

        return view('backend/modules/users/user-add');

    }

    public function validationcheck($data){
    return Validator::make($data,[
        'title' => 'required|max:255',
        ]);

   }

    public function addPost(){ 
     $validator = $this->validationcheck(Input::all());
        if($validator->fails()){
            return Redirect::back()->withErrors($validator->errors())->withInput();
        }else{
        $data['name'] = Input::get('title');
        $data['email'] = Input::get('email');
          $addData = $this->user->addData($data);
        return Redirect::to(PREFIX . 'users');
            }
    }

    public function edit()
    {
       $id = Input::get('id');
       $data['editData'] = $this->user->getUserById($id);
       if(empty($data['editData'])){
        return Redirect::to(PREFIX . 'users');
      }
        return view("backend/modules/users/user-edit", $data);
    }


    public function editPost()
    {
      $validator = $this->validationcheck(Input::all());
       if($validator->fails()){
            return Redirect::back()->withErrors($validator->errors())->withInput();
        }else{
        $updatedData['name'] = Input::get('title');
        $updatedData['email'] = Input::get('email');
        $id = Input::get('id');
        $editdata = $this->user->editDate($updatedData, $id);
        return Redirect::to(PREFIX . 'users');
    }
    }

    public function delete()
    {
        $id = Input::get('id');
        $deletedata = $this->user->deleteUser($id);
        return Redirect::back();
    }

    


    public function search(){
         $search = Input::get('title');
    	$data['search'] = $this->user->searchUser($search);
    	return view("backend/modules/users/user-search",$data);
    }
}
