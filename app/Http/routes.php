<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

define("ABS_URL", "/cms/");
//Backend
define('PREFIX','/cms/');
Route::get(PREFIX, 'Auth\AdminController@getLogin');
Route::post(PREFIX.'login', 'Auth\AdminController@postLogin');
Route::get(PREFIX.'logout', 'Auth\AdminController@logout');
Route::get(PREFIX.'home', ['middleware'=>['admin','role'],'uses'=>'cms\\modules\\home\\homeController@index']);

Route::group(['prefix' => PREFIX, 'middleware' => ['admin','role']],function(){
	Route::group(['namespace' => 'cms\\modules\\' .Request::segment(2) ],function(){

		
		Route::get('{module}', Request::segment(2) . 'Controller@index');
		 Route::get('{module}/{page}', Request::segment(2) . 'Controller@' . Request::segment(3));

    	Route::post('{module}/{page}', Request::segment(2) . 'Controller@' . Request::segment(3));
    	Route::get('{module}/pages/{page}/{id}', Request::segment(4) . 'Controller@' . Request::segment(5));
    	Route::post('{module}/pages/{page}/{id}', Request::segment(4) . 'Controller@' . Request::segment(5));
    	Route::get('{module}/pages/{page}', Request::segment(4) . 'Controller@index');
    	Route::get('{module}/pages/{page}/{abc}/{id}', Request::segment(4) . 'Controller@' . Request::segment(5));

    Route::post('{module}/pages/{page}/{abc}/{id}', Request::segment(4) . 'Controller@' . Request::segment(5));
});


});
//prefix is used in url and namespace is used to define path in controller like:(App\Http\Controllers namespace)'

// Route::get('/', function () {
//     return view('welcome');
// });

// Route:: get('/', 'HomeController@home');

Route::auth();

Route:: get('/', 'HomeController@home');

Route:: get('/home', 'HomeController@home');

Route::get('/date-facts', 'DateTipsController@index');

Route::get('/find-a-date', 'FindDateController@index');

Route::get('/articles', 'ArticleController@index');

// Route:: get('/home', 'HomeController@home');


// Route:: get('/login', 'HomeController@index');


// Route:: get('/logout', 'Auth\AuthController@getLogout');

// Route::get('/home', 'HomeController@indehomex');

// Route::get('/site', 'HomeController@index');
