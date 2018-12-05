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
    
    

