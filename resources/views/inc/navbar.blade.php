 
 {{-- <link rel="stylesheet" href="{{asset('css/nav.scss')}}">
<nav class="navbar navbar-inverse">
	 <div class="container">
	 	<div class="navbar-header">
	 		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	 			<span class="sr-only">Toggle navigation</span>
	 			<span class="icon-bar"></span>
	 			<span class="icon-bar"></span>
	 			<span class="icon-bar"></span>
	 		</button>
	 		<a class="navbar-brand" href="/">{{config('app.name','LsSAPP')}}</a>
	 	</div>
	 	<div id="navbar" class="collapse navbar-collapse">
	 		<ul class="nav navbar-nav">
	 			<li><a href="/" >home</a></li>
	 			<li><a href="/about" >about</a></li>
	 			<li><a href="/services" >services</a></li>
	 		</ul>
	 	</div>
	</div>
</nav>	 		 --}}	
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script> --}}

{{-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="/">home</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="/about">about</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/services">services</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="/posts">Blog</a>
    </li>
  
  
    <li class="nav-item">
     <a class="nav-link" href="/posts/create">create post</a></li>
  </ul>	
</nav>
 --}}
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
