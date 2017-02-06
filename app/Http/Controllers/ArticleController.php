<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;

class ArticleController extends Controller
{

	public function __construct(){
	$this->article = new Article;
	}



  public function index(){
   	$data['articleList'] = $this->article->getAllData();
   	return view ('site/articles/article',$data);
   }

   public function detail($slug){
   	$articleDetails = $this->article->getDataBySlug($slug);
  if(empty($articleDetails)){
    		abort(404);
    	}
   $data['articleDetails'] = $articleDetails;
   return view('site/articles/articles-details', $data);

   }







}
