<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    protected $table = 'menu';
    protected $fillable = ['name', 'slug', 'parent_id', 'position'];

    public function getAllData(){
    	return menu::all();
    }

    public function getByPosition(){
        return menu::where('status','publish')->orderBy('position','asc')->get();
    }

    // public function getByParentIdOne($id){
    //    return menu::where('parent_id',$id);
    // }

    public function getDataById($id)
    {
    	return menu::where('id', $id)->first();
    }
    public function addData($data)
    {
    	return menu::create($data);
    }

    public function editData($data, $id)
    {
    	   $article = menu::find($id);
    return $article->update($data);
    }

    public function deleteData($id)
    {
    	$menu = menu::find($id);
    	return $menu->delete();
    }

    public function parent() {
        return $this->hasOne('App\menu', 'id', 'parent_id');
    }

    public function children() {
        return $this->hasMany('App\menu', 'parent_id', 'id');
    } 


}
