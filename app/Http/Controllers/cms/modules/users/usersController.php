<?php

namespace App\Http\Controllers\cms\modules\users;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Input;
use Auth;
use Redirect;
use Validator;
use Hash;

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
        'username' => 'required|max:255',
        ]);

   }

    public function addPost(){ 
     $validator = $this->validationcheck(Input::all());
        if($validator->fails()){
            return Redirect::back()->withErrors($validator->errors())->withInput();
        }else{
        $data['first_name'] = Input::get('first-name');
        $data['last_name'] = Input::get('last-name');
        $data['name'] = Input::get('username');
        $data['email'] = Input::get('email');
        //$data['password'] = Input::get('password');
        $data['password'] = bcrypt(Input::get('password'));
        // $password = Input::get('passwordformfield'); // password is form field
        // $hashed = Hash::make($password);
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
        $updatedData['first_name'] = Input::get('first-name');
        $updatedData['last_name'] = Input::get('last-name');
        $updatedData['name'] = Input::get('username');
        //$updatedData['email'] = Input::get('email');
        $updatedData['password'] = bcrypt(Input::get('password'));
        //$updatedData['password'] = Input::get('password');
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

    public function  passwordChange(){
        return view('backend/modules/users/user-change-password');
    }


    public function admin_credential_rules(array $data)
        {
            $messages = [
            'current-password.required' => 'Please enter current password',
            'password.required' => 'Please enter password',
                         ];

  $validator = Validator::make($data, [
    'current-password' => 'required',
    'password' => 'required|same:password',
    'password_confirmation' => 'required|same:password',     
  ], $messages);

  return $validator;
}


public function postCredentials(Request $request)
{
  if(Auth::check())
  {
    $request_data = $request->All();
    $validator = $this->admin_credential_rules($request_data);
    if($validator->fails())
    {
      return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
    }
    else
    {  
      $current_password = Auth::User()->password;          
      if(Hash::check($request_data['current-password'], $current_password))
      {           
        $user_id = Auth::User()->id;                       
        $obj_user = User::find($user_id);
        $obj_user->password = Hash::make($request_data['password']);;
        $obj_user->save(); 
        return Redirect::to(PREFIX. 'home');
      }
      else
      {           
        $error = array('current-password' => 'Please enter correct current password');
        return response()->json(array('error' => $error), 400);   
      }
    }        
  }
  else
  {
    return redirect()->to('/');
  }    
}

    
}
