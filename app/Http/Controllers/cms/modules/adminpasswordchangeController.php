<?php

namespace App\Http\Controllers\cms\modules;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Redirect;
use Validator;
use Auth;
use Hash;
class adminpasswordchangeController extends Controller
{
   // public function __construct(){
   //      $this->middleware('auth');
   //  }
   
   public function index()
   {
   return view('backend/modules/admin-change-password');
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
  
//dd(Auth::guard('admin')->check());
  if(Auth::guard('admin')->check())
  //if(Auth::Check())
  {
    $request_data = $request->All();
    $validator = $this->admin_credential_rules($request_data);
    if($validator->fails())
    {
      return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
    }
    else
    {   
      $current_password = Auth::guard('admin')->user()->password;
      if(Hash::check($request_data['current-password'], $current_password))        
      {           
        $user_id = Auth::guard('admin')->user()->id;  
        $obj_user =  Auth::guard('admin')->user();
        $obj_user->password = bcrypt($request_data['password']);
        $obj_user->update();
        return Redirect::to(PREFIX);
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
