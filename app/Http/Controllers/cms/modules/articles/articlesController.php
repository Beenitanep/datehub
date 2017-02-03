<?php

namespace App\Http\Controllers\cms\modules\articles;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\ArticleCategory;
use Input;
use Redirect;
use Validator;
use File;
use Image;

class ArticlesController extends Controller
{
    public function __construct()
    {
    	$this->article =  new Article;
    	$this->articleCategory = new ArticleCategory; 
       
    }

    public function index()
    {
    	$data['articleData'] = $this->article->getAllData();
    	return view('backend/modules/articles/articles-list', $data);
    }

    public function add()
    {
    	$data['articleCategoryDate'] = $this->articleCategory->getAllData();
    	return view('backend/modules/articles/articles-add', $data);
    }

    public function validationcheck($data){
    	return Validator::make($data,[
    		'title' => 'required|max:255',
            'slug' => 'unique:articles|alpha_dash',
            'tags' => 'required',
    		'image' => 'required|image|mimes:jpeg,jpg,png,bmp,gif,svg|max:4000'
    		]);
    }

    public function validationCheckUpdated($data){
        return Validator::make($data,[
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,jpg,png,bmp,gif,svg|max:4000'
            ]);
    }


    public function addPost()
    {
        $validator = $this->validationcheck(Input::all());
        if($validator->fails()){
           return Redirect::back()->withErrors($validator)->withInput(Input::all());
        }else{
            if(Input::hasFile('image'))
            {
                $destinationpath = 'uploads/article/';
                $extension = Input::file('image')->getClientOriginalExtension();
                $originalName = Input::file('image')->getClientOriginalName();
                $data['image'] = date('ymd') . str_replace(" ", "_", $originalName);
                //Input::file('image')->move($destinationpath, $data['image']);
                $thumbimgDir = $destinationpath.'thumb/'.$data['image'];
                //dd( $thumbimgDir);
                $thumb = Image::make(Input::file('image'));
                $thumb->fit(263,151);
                $thumb->save($thumbimgDir, 60);

                $imageDir = $destinationpath. 'image/' . $data['image'];
                $image = Image::make(Input::file('image'));
                $image->fit(500,450);
                $image->save($imageDir, 60);



                $coverDir = $destinationpath.'cover/'.$data['image'];
                $cover = Image::make(Input::file('image'));
                $cover->fit(850,520);
                $cover->save($coverDir,60);


               
            }
         $data['title'] = Input::get('title');
         if(Input::get('slug')!= ''){
          $data['slug'] = strtolower(Input::get('slug')) ;
         }else{
          $data['slug'] = str_replace(' ','-', strtolower(Input::get('title')));
         }
         $data['author'] = Input::get('author');
         $tags = Input::get('tags');
         $tagsValue = '';
         for($i=0;$i<count($tags);$i++){
         	$tagsValue .= $tags[$i].',';
         }
        $data['tags'] = rtrim($tagsValue,',');
        $data['description'] = Input::get('description');
        $data['publish_date'] = Input::get('publish-date');
        $data['status'] = Input::get('status');
        $adddata =  $this->article->addData($data);
        return Redirect::to(PREFIX . 'articles/pages/articles');
    }
    }

    public function edit()
    {
    	$data['articleCategoryData'] = $this->articleCategory->getAllData();
    	$data['articleData'] = $this->article->getDataById(Input::get('id'));
        if(empty($data['articleData'])){
        return Redirect::to(PREFIX . 'articles/pages/articles');    
        }
    	return view('backend/modules/articles/articles-edit', $data);
    }

    public function editPost()
    {
       $validator = $this->validationCheckUpdated(Input::all());
       if($validator->fails()){
            return Redirect::back()->withErrors($validator->errors())->withInput();
        }else{
            if(Input::hasFile('image'))
            {

                $destinationpath = 'uploads/article/';
                $extension = Input::file('image')->getClientOriginalExtension();
                $originalName = Input::file('image')->getClientOriginalName();
                $updatedData['image'] = date('ymd') . str_replace(" ", "_", $originalName);
                //Input::file('image')->move($destinationpath, $data['image']);
                $thumbimgDir = $destinationpath.'thumb/'.$updatedData['image'];
                //dd( $thumbimgDir);
                $thumb = Image::make(Input::file('image'));
                $thumb->fit(263,151);
                $thumb->save($thumbimgDir, 60);

                $imageDir = $destinationpath. 'image/' . $updatedData['image'];
                $image = Image::make(Input::file('image'));
                $image->fit(500,450);
                $image->save($imageDir, 60);



                $coverDir = $destinationpath.'cover/'.$updatedData['image'];
                $cover = Image::make(Input::file('image'));
                $cover->fit(850,520);
                $cover->save($coverDir,60);

            }

        $updatedData['title'] = Input::get('title');
        $updatedData['slug'] = str_replace(" ", "-", strtolower(Input::get('title')));
        $updatedData['author'] = Input::get('author');
        $tags = Input::get('tags');
            $tagsValue = '';
            for($i=0;$i<count($tags);$i++){
                $tagsValue .= $tags[$i].',';
            }
        $updatedData['tags'] = rtrim($tagsValue,',');
        $updatedData['description'] = Input::get('description');
        $updatedData['publish_date'] = Input::get('publish-date');
        $updatedData['status'] = Input::get('status');
        $id = Input::get('id');
        $editdata = $this->article->editData($updatedData, $id);
        return Redirect::to(PREFIX . 'articles/pages/articles');
    }
    }

    public function delete()
    {
        $id = Input::get('id');
        $articleData = $this->article->getDataById($id);
        if ( $articleData->image != '' && file_exists("uploads/article/thumb/" . $articleData->image)) {
            File::delete("uploads/article/thumb/" . $articleData->image);
        }
        if ( $articleData->image != '' && file_exists("uploads/article/cover/" . $articleData->image)) {
            File::delete("uploads/article/cover/" . $articleData->image);
        }
        if ( $articleData->image != '' && file_exists("uploads/article/image/" . $articleData->image)) {
            File::delete("uploads/article/image/" . $articleData->image);
        }
       
        $deleteData = $this->article->deleteData($id);
        return Redirect::back();
    }

     public function deleteImage()
    {
        $id = Input::get('id');
       $articleData = $this->article->getDataById($id);
       if ( $articleData->image != '' && file_exists("uploads/article/thumb/" . $articleData->image)) {
            File::delete("uploads/article/thumb/" . $articleData->image);
        }
        if ( $articleData->image != '' && file_exists("uploads/article/cover/" . $articleData->image)) {
            File::delete("uploads/article/cover/" . $articleData->image);
        }
        if ( $articleData->image != '' && file_exists("uploads/article/image/" . $articleData->image)) {
            File::delete("uploads/article/image/" . $articleData->image);
        }
        $updatedData['image'] = '';
        $updatedData = $this->article->editData($updatedData, $id);
        return Redirect::back();
    }





    public function publish(){
        $id = Input::get('id');
        $updatedData['status'] = 'active';
        $this->article->editData($updatedData, $id);
        return Redirect::back();
    }

    public function unPublish(){
        $id = Input::get('id');
        $updatedData['status'] = 'inactive';
        $this->article->editData($updatedData, $id);
        return Redirect::back();
    }

}
