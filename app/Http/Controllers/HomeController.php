<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Slider;
use App\Article;
use App\AboutUs;
use App\menu;
use Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->slider = new Slider();
         $this->article = new Article();
         $this->aboutus = new AboutUs();
         $this->menu = new menu();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('home');
    }

    public function home()
    {   
        $id = Input::get('id');
        $data['homePageSlider'] = $this->slider->getHomePageSlider();
        $data['homearticle'] =  $this->article->getHomeData();
        $data['homeAboutUs'] =  $this->aboutus->getData();
        //$data['homemenu'] = $this->menu->getAllData(); 
        //$data['homemenu'] = $this->menu->getByPosition();
        //$data['homemenubyid'] = $this->menu->getByParentIdOne($id);
        //$data['menuId'] =  "home";
        //dd($data['homemenu']);
        return view ('site/home',$data);
    }

   
}
