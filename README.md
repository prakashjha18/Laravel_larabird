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

[Basic Routing & Controllers](Basic Routing & Controllers)

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
well i think we are done with most of the frontt-end work next we will start working with database, Eloquest Orm, relations and more stuff..

# Models and & Database Migrations
I'm assuming that you are using XAMPP. go to http://localhost/phpmyadmin/ and create a new table as larablog
now to to .env and enter this
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=larablog
DB_USERNAME=root
DB_PASSWORD=
```
if everything while installing XAMPP was default and you have not change db access this this will be the same for you laravel application too
now we are ready to go
in terminal 

we also want to create a model
```php artisan make:model Post -m``` beacause to this two things will be added 
1)app/Post.php
2)create post table in database migrations
in create_post_table.php include
```
public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->mediumText('body');
            $table->timestamps();
        });
    }
```
the up() will create all this columns in our posts table of database 
while migration u might get an erroer therefore to avoid the error do this in ```Providers/AppServiceProvider.php```
```

use Illuminate\Support\Facades\Schema;


    public function boot()
    {
        Schema::defaultStringLength(191);
    }

   
}
```
now open the terminal and 
```php artisan migrate```
and now you will see the table in your mysql database

## tinker
tinker is a laravel concept or method to interact with our database hence go to terminal ```php artisan tinker```
insert the values in your table using tinker
```
$post = new App\Post();
$post->title = 'Post One';
$post->body = 'this is post body';
$post->save();
```
go on and add another
$post creates a kind of instance of our Model Post 
now get out of tinker by writing ```quit```
now in terminal 
```php artisan make:controller Postscontroller --resource```
now this will automatically include 6 functions
which are
```
index to list all the posts                               --no parameters needed
create to create the posts                                --no parameters needed
store to store the values in db from form                 --request parameters needed to store the values 
show to show the id of posts                              --id parameters needed
edit for same reson needed id paramets ti edit which form --id parameters needed
update neede request and id because we are submitting
and we want to know which post to update                  --id and request parameter needed
destroy to delte the post of user                         --id parameter needed
```
now comes the routing part u might be wondering that now with this 7 functions we have so much to write in ```web.php```
well you are wrong ```--resource``` thing while making controller helped a lot, now u just have to add this in ```web.php``
```
Route::resource('posts','PostsController');
``` 
and we are done the ```posts``` is accosiated with PostsController and this justs binds with our view which we will be using next

you can also see all the routes for your application by writhing this command in your terminal

```php artisan route:list```

# Fetching data with Eloquent
now in navbar when we block in BLOGS the index function of PostController.php is called in order to show th data we have to first write ```use App\Post;``` above the class and this simply means we are bringing the Post class of Post.php
now add this code in index() function of our PostController.php 
```
public function index()
    {
       $posts = Post::orderBy('created_at','desc')->paginate(10);
       return view('posts.index')->with('posts',$posts);
     }
```
here $posts fetches the table connent of our post.php
you can even you some more eloquent syntax like these
```
$posts = Post::all();
return Post::where('title','Post Two')->get();
$posts = Post::orderBy('title','desc')->take(2)->get();
$posts = Post::orderBy('title','desc')->get();
```
experiment with them if you want

now create a folder named posts and file named index.blade.php and include this code there

```
@extends('layouts.app')

@section('content')

      <h1>Posts</h1>
      @if(count($posts)>0)
         @foreach($posts as $post)

            <div class ="list-group-item">
              <div class="row">
                <div class="col-md-4 col-sm-8">
                  <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
               <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                </div>
              </div>    
             </div>
          @endforeach 
          {{$posts->links()}} 	
      @else
         <p>no posts found</p>
      @endif   

@endsection
```
very basic stuff done here we passed the $posts in index function to our index.blade.php. so now get your mind clear any variable used in index.blade.php is not global they all are passed
now notice this ```href="/posts/{{$post->id}}"``` by clicking this link will call ```show()``` function 
```{{$posts->links()}}``` if for pagination, for now it will kick in if we have more than 10 posts because we wrote this ```paginate(10);``` in index() you can change to value from 10 to 1 if you want to experiment. go on and then come back.
see thats how even the concept of pagination is simple in laravel (love for this framework just keeps growing)
include this code in show function
```
public function show($id)
    {
        //
        $post = post::find($id);
        return view('posts.show')->with('post',$post);

    }
 ```
post::find($id); simply fetches the post by that id and incase you are wondering what is this? is this some code of php, NO this ELOQUENT ORM a way to interact with database just like SQL but way better and cleaner.
now create the file show.blade.php in posts folder and include this file
```
@extends('layouts.app')

@section('content')

      <h1>{{$post->title}}</h1>
      <br><br>
      <div>
         {{{$post->body}}
      </div> 
      <hr>
      <small>Written on {{$post->created_at}}</small> 
      <br>
      <br>
      <hr>
      <a href="/posts" class="btn btn-primary btn-lg">Go Back</a> 
@endsection
```
i don't think explaination for thi will be required if you have paid attention on above documntation so now we can see individual post in individual pages

# forms and saving data

to create our posts include this code
```
public function create()
    {
        return view('posts.create');
    }
```
you know the other step which is to create a file as create.blade.php in posts folder
now we need a form to in this file here comes other concept of form which is laravel collective 
we need to write this in terminal
```
composer require "laravelcollective/html":"^5.4.0"
```
Next, add your new provider to the providers array of config/app.php:

 ``` 
 'providers' => [
    // ...
    Collective\Html\HtmlServiceProvider::class,
    // ...
  ],
  ```
Finally, add two class aliases to the aliases array of config/app.php:

 ``` 'aliases' => [
    // ...
      'Form' => Collective\Html\FormFacade::class,
      'Html' => Collective\Html\HtmlFacade::class,
    // ...
  ],
  ```
  see the documentation of laravel collective here https://laravelcollective.com/docs/master/html after we are done creating our project
  now in create.blade.php
  ```
@extends('layouts.app')

@section('content')

      <h1>create your post</h1>
      {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          <div class="form-group">
          	 {{Form::label('title','Title')}}
          	 {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Title' ])}}
          </div>
          <div class="form-group">
          	 {{Form::label('body','Body')}}
          	 {{Form::textarea('body','',['class' => 'form-control', 'placeholder' => 'body text' ])}}
          </div>
             {{Form::submit('Submit',['Class'=>'btn btn-primary'])}}
      {!! Form::close() !!}
@endsection
```
if you know simple bootstrap then you can easily understand the params here
now when we submit our form its gonna make submit request to store()
in store function
```
$this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
            
        ]);
       
       
       //create post
        $post = new post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        
        $post->save();


        return redirect('/posts')->with('success','Post Created');
  ```      
the $this->validate is for validation in laravel of the post which we have requested, $post = new post; just creats the new post and assigns it to $post and now if we add all the feild and click submit our post will be added to the database, what if we have not input any value and we click submit, then our post will not submit and to display message we have to crea session 
so in inc folder creatte messages.blade.php and include this file
```
@if(count($errors)>0)
    @foreach($errors->all() as $error)
       <div class="alert alert-danger">
       	  {{$error}}
       </div>
    @endforeach
@endif 

@if(session('success'))
    <div class="alert alert-success">
    	{{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
    	{{session('error')}}
    </div>
@endif
```
$error will show session if the titles and body are not filled
and other will show based on our success of submitting form.
now in layouts/app.blade.php include the messages file in div id app
```
<div id="app">

        @include('inc.navbar')
        <div class="container">
              @include('inc.messages')
             
            @yield('content')
        
    </div>
 ```
 and now we are good to go our form validatioon stuff is added, sessions are handled
 yes so now we have done create and read work from database
in you navbar create a link with ```href="/posts/create``` that'll do for now you can also use laravel cke-editor for body of your form
#123















    

