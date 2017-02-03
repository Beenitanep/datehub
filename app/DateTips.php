<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DateTips extends Model
{
   public $timestamps = false;

    protected $table = 'date_tips';

    protected $fillable  = ['title', 'slug', 'image', 'author', 'tags', 'description', 'publish_date', 'status', 'created_at', 'updated_at'];

    public function getDateIdeas()
    {
    	return DateTips::where('tags',1)->paginate(10);
    }

    public function getAllDateIdeas()
    {
    	$dateTips = DateTips::query();
        $dateTips->where('tags',1);
        $dateTips->where('status','active');
        $dateTips->orderBy('title','asc');
        return $dateTips->paginate(9);
    }
    public function getDateAdvice()
    {
    	return DateTips::where('tags',1)->paginate(10);
    }

    public function getAllDateAdvice()
    {
    	$dateTips = DateTips::query();
    	$dateTips->where('tags',2);
    	$dateTips->where('status','active');
    	$dateTips->orderBy('title','asc');
    	return $dateTips->paginate(9);
    }
    public function getDateFacts()
    {
    	return DateTips::where('tags',3)->paginate(10);
    }

    public function getAllDateFacts()
    {
    	$dateTips = DateTips::query();
    	$dateTips->where('tags',3);
    	$dateTips->where('status','active');
    	$dateTips->orderBy('title','asc');
    	return $dateTips->paginate(9);
    }

    public function getDataById($id)
    {
    	return DateTips::where('id', $id)->first();
    }

    public function addDateFacts($data)
    {
    	return DateTips::create($data);
    }

    public function editDateFacts($data, $id)
    {
    	$dateTips = DateTips::where('id',$id)->first();
    	return $dateTips->update($data);
    }

    public function deleteDateFacts($id)
    {
    	$dateTips = DateTips::find($id);
    	return $dateTips->delete();
    }
}
