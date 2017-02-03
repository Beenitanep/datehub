<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\DateTips;

class DateTipsController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->dateTips = new DateTips;
	}

   public function index(){
   	$data['dateIdea'] = $this->dateTips->getAllDateIdeas();
   	$data['dateAdvice'] = $this->dateTips->getAllDateAdvice();
   	$data['datefacts'] = $this->dateTips->getAllDateFacts();
   	return view('date_tips/date_tips',$data);
   }
}
