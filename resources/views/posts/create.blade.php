@extends('layouts.app')
@include('layouts.maps')
@section('content')


      <h1>create your post</h1>
      <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <meta name="description" content="Display a moveable marker on a map">
    
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css" />
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
  </head>
  <div class="container">
  <body>
    
    
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
          <div class="form-group">
          	 {{Form::label('title','Title')}}
          	 {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Title' ])}}
          </div>
          <div class="form-group">
          	 {{Form::label('body','Body')}}
          	 {{Form::textarea('body','',['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'body text' ])}}
          </div>
          <div class="form-group">
             {{Form::label('species_name','Species Name')}}
             {{Form::text('species_name','',['class' => 'form-control', 'placeholder' => 'Species Name' ])}}
          </div>
          <div class="form-group">
             {{Form::label('number_sigh','Numbers Sighted')}}
             {{Form::text('number_sigh','',['class' => 'form-control', 'placeholder' => 'Total no. of birds sighted' ])}}
          </div>
          <div class="form-group">
             {{Form::label('location','location')}}
             {{Form::text('location','',['class' => 'form-control', 'placeholder' => 'location' ])}}
          </div>
          <div class="form-group">
             {{Form::label('lat','latitude')}}
             {{Form::text('lat','',['class' => 'form-control', 'placeholder' => 'latitude' ])}}
          </div>
          <div class="form-group">
             {{Form::label('lng','longitutde')}}
             {{Form::text('lng','',['class' => 'form-control', 'placeholder' => 'longitude' ])}}
          </div>
          <div class="form-group">
             {{Form::file('cover_image')}}
          </div>   
                    {{Form::submit('Submit',['Class'=>'btn btn-primary'])}}
      {!! Form::close() !!}
      
@endsection






















