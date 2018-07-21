<!doctype html>
<html lang="{{ app()->getLocale() }}">
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

        
       </head>
    <body>
        @include('inc.navbar')
       
        <div class="container">
            @include('inc.messages')
               @yield('content')
        </div> 
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
               CKEDITOR.replace( 'article-ckeditor' );
        </script>      
    </body>
</html>
