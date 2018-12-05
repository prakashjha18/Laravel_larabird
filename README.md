## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects.

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# blog-website
blog website with full authentication and database connectivity


# setting up laravel project

## step 1
you need to have git, xampp  installed in you system

## step 2
install composer
Composer is a dependency manager for PHP like Pip is for python. Here we will use composer to install laravel project and its dependency. To install composer visit https://getcomposer.org/download/
## step 3
```
composer create-project laravel/laravel lsapp
```
and now laravel is installed in you system 

## step 4
```
php artisan serve
```
now your laravel application in deployed in localhost 


# Basic Routing & Controllers
we usually dont want to create route directly from web.php that will direct to a folder that is not a good practice
what we would want to do is to create a controller and teh set the route to a given controller function and then direct that function to specific page
```
php artisan make:controller PageController
```
run this command in cmd or any other integrated terminal and this will create a controller in http/Controllers which consists of a class PageController which extends the main Controller class
now routing through controller is going to be a 3 step work
## step 1
in PageController.php inside PageController class
```
public function index(){
    	$title = 'welcome to laravel!';
    	return view('pages.index')-> with('title',$title);
    }
```
## step 2
add this Route in Web.php
```
Route::get('/', 'PageController@index');
```
## step 3
and now the routing part is done now goto views folder in resources create a folder named as ```pages``` and create a file named as ```index.blade.php```
inside index.blade.php whatever you write will be displayed in ```Localhost:8000``` because we have added the route ```/``` in web.php

follow the same step to create ```/about``` 
in web.php
```Route::get('/about', 'PageController@about');```
in class PageController
```

     public function about(){
    	return view('pages.about');
    }
```
and now create about.blade.php in pages folder
now go on and do the same to add ```/services``` we will be needing this routing in future do the exact same step to create this route
just like how we did pass variable in index function of PagesController we can do the same for arrays in ```/services``` 
create the function as
```
public function services(){
     	$data = array(
         'title' => 'services',
         'services'=>['webdesign','programming','SEO']
     	);
    	return view('pages.services') -> with($data);
    }
 ``` 
 add the routing in web.php
 ```Route::get('/services', 'PageController@services');```
 and now create pages/services.blade.php and in there you can display $title and $services
 
 now ou have a good understanding of ROuting and Controller in Laravel
 # Blade templating 
 use this link for highlighting your laravel code https://github.com/Medalink/laravel-blade
 now lets get yoou to a concept of code redundancy laravel has a really cool approarch to work with code redundancy let me cover this to you with a really coolm example from our application in views create a new folder as layouts and in ayouts create a new file as ```app.blade.php```
 add this code there
 ```
 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{-- {{ config('app.name', 'Laravel') }} --}}THIS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
             
            @yield('content')
        
    </div>
    </div>
</body>
</html>
```
take notice of ```@yeild content```
now in 
```/,/services, /about``` 
include this in index.blade.php
```

       @extends('layouts.app')

       @section('content')
    <div class="jumbotron text-center">
         <h1>welcome to laravel!</h1>
         <p> this is the laravel application of a Blog website</p>
          <p><a class="btn btn-primary btn-lg" href="/login" role="button">login</a> <a class="btn btn-success btn-lg" href="/register" role="button">register</a></p>
    </div> 
       @endsection
```
this in services.blade.php
```
 @extends('layouts.app')

 @section('content')
 
       <h1>{{$title}}</h1>
       
       @if(count($services)>0)
       <ul class="list-group">
          @foreach($services as $service)
          <li class="list-group-item">{{$service}}</li>

          @endforeach
      </ul>
     @endif

   @endsection
   ```
and this in about.blade.php
```
 @extends('layouts.app')

       @section('content')
       <h1>about</h1>
       <p>this is the about page</p>
@endsection
```
let me get you through the code given here 
```@extends(layouts.app)``` extends everything which is written in ```app.blade.php```
and then ```@section('content')``` everything written inside this gets in the ``` @yield('content')``` of ```app.blade.php``` so now we dont have to repeat same code in every page

## setting up navbar 
we wont include the bootstrap navbar in app.blade.php instead create a new folder as inc
and in inc create a new file as ```navbar.blade.php``` and include this code in that file
```
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    THIS
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                   {{--  <nav class="navbar navbar-expand-sm bg-dark navbar-dark"> --}}
                   	 <ul class="navbar-nav">
                   	    <li class="nav-item">
                         <a class="nav-link" href="/">home</a>
                     </li>
                    
                          <li class="nav-item">
                            <a class="nav-link" href="/about">about</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/services">services</a>
                          </li>
                           <li class="nav-item">
                            <a class="nav-link" href="/posts"><strong><i>BLOGS</i></strong></a>
                          </li>
                      </ul>




                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="/home">Dashboard</a></li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
```
****yes i know this is code is a mess but those were my initial days of working with front end*****
the Blogs tab will not be working right now but in later we are going to use it so put this for now as it is , also the login register thing is laravel work which i will explain later fow now add it as it is , just some front end bootstrap work 
now update your ```app.blade.php``` with this code, i think only one line is changed
```
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{-- {{ config('app.name', 'Laravel') }} --}}THIS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        @include('inc.navbar')
        <div class="container">
              
             
            @yield('content')
        
    </div>
    </div>
</body>
</html>
```
well i think we are done with most of the fornt-end work next we will strat working with database, Eloquest Orm, relations and more stuff..
    
    

