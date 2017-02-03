<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Article extends Model
{
   protected $table = 'articles';
   protected $fillable = ['title', 'slug', 'image', 'author', 'tags','description', 'publish_date', 'status', 'created_at', 'updated_at'];

   public function getHomeData()
   {
      
      return Article::take(4)->get();
   }

   public function getAllData()
   {
   		
      return Article::paginate(8);
   }

   public function getDataById($id)
   {
   	return Article::where('id', $id)->first();
   }

   public function addData($data)
   {
   	return Article::create($data);
   }

   public function getCategoryTitleById($categoryId) 
   {
      $category = DB::table('articles_category')->where('id', $categoryId)->first();
      if(!empty($category)){
        return $category->title;
      }else{
        return "N/A";
      }
    }

    public function getCategorySlugById($categoryId) 
    {
        return DB::table('articles_category')->where('id', $categoryId)-first()->slug;
    }

   public function editData($data, $id)
   {
   	$article = Article::find($id);
   	return $article->update($data);
   }

   public function deleteData($id)
   {
   	$article= Article::find($id);
   	return $article->delete();
   }

   public function getAllArticle()
   {
   	return Article::where('status','active')->get();
   }
}
