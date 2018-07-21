<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
    	$title = 'welcome to laravel!';
    	// return view('pages.index',compact('title'));
    	return view('pages.index')-> with('title',$title);
    }

     public function about(){
    	return view('pages.about');
    }

     public function services(){
     	$data = array(
         'title' => 'services',
         'services'=>['webdesign','programming','SEO']
     	);
    	return view('pages.services') -> with($data);
    }
}
?>