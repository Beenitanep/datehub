<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $table = 'articles_category';
    protected $fillable = ['id','title','slug'];

    public function getAllData()
    {
    	return ArticleCategory::paginate(15);
    }

    public function getDataById($id)
    {
    	return ArticleCategory::where('id', $id)->first();
    }

    public function addData($data)
    {
    	return ArticleCategory::create($data);
    }

    public function editData($data, $id)
    {
    	$articles = ArticleCategory::find($id);
    	$articles->update($data);
    }

    public function deleteData($id)
    {
    	$articles = ArticleCategory::find($id);
    	return $articles->delete();
    }
}
