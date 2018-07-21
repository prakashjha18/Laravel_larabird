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
          	 {{Form::textarea('body','',['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'body text' ])}}
          </div>
          <div class="form-group">
             {{Form::file('cover_image')}}
          </div>   

          {{Form::submit('Submit',['Class'=>'btn btn-primary'])}}
      {!! Form::close() !!}
@endsection






















