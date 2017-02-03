<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\menu;
Use Input;
class MenuViewComposer {

	 public function __construct(menu $menu)
    {
        // Dependencies automatically resolved by service container...
        $this->menu = $menu;
    }
	

    public function compose(View $view) {
    	$id = Input::get('id');
        $menuData = $this->getByParent();
        $view->with('homemenu', $menuData);
    }

    public function getByParent(){
        return menu::where('parent_id',0)->where('status','publish')->orderBy('position','asc')->get();
    }

    // public function parent() {
    //     return $this->hasOne('App\menu', 'id', 'parent_id');
    // }

    // public function children() {
    //     return $this->hasMany('App\menu', 'parent_id', 'id');
    // } 



    
}