<?php

namespace App\Http\Controllers\cms\modules\articles;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ArticleCategory;
use Input;
use Redirect;
use Validator;

class categoryController extends Controller
{
   public function __construct()
   {
   	$this->articleCategory = new ArticleCategory;
   }

   public function index()
   {
   	$data['articleCategoryData'] = $this->articleCategory->getAllData();
   	return view("backend/modules/articles/category-list", $data);
   }

   public function validationCheck($data)
   {
      return Validator::make($data,[
         'title' => 'required|max:255',
            'slug' => 'unique:articles|alpha_dash'
         ]);
    }

    public function validationCheckUpdated($data)
    {
        return Validator::make($data,[
            'title' => 'required|max:255'
            ]);
    }

   public function add()
   {
   	return view("backend/modules/articles/category-add");
   }


   public function addPost()
    {
        $validator = $this->validationCheck(Input::all());
        if($validator->fails()){
            return Redirect::back()->withErrors($validator->errors())->withInput();
        }else{
        $data['title'] = Input::get('title');
        if(Input::get('slug')!= ''){
         $data['slug'] = strtolower(Input::get('slug'));
        }else{
         $data['slug'] = str_replace(' ', '-', strtolower(Input::get('title')));
        }
         $adddata =  $this->articleCategory->addData($data);
        return Redirect::to(PREFIX . 'articles/pages/category');
    }
    }

    public function edit()
    {
       $data['articlesCategoryData'] = $this->articleCategory->getDataById(Input::get('id'));
       if(empty($data['articlesCategoryData'])){
        return Redirect::to(PREFIX . 'articles/pages/category');
       }
        return view("backend/modules/articles/category-edit", $data);
    }

    public function editPost()
    {
      $validator = $this->validationCheckUpdated(Input::all());
      if($validator->fails()){
            return Redirect::back()->withErrors($validator->errors())->withInput();
        }else{
      $updateData['title'] = Input::get('title');
      if(Input::get('slug') != ' ' ){
         $updateData['slug'] = strtolower(Input::get('slug'));
      }else{
          $updateData['slug'] = str_replace(' ', '-', Input::get('title'));
      }

      $editdata = $this->articleCategory->editData($updateData, Input::get('id'));
      return Redirect::to(PREFIX . 'articles/pages/category');
   }
    }

    public function delete()
    {
        $id = Input::get('id');
      $deleteData = $this->articleCategory->deleteData($id);
      return Redirect::back();
    }
}
