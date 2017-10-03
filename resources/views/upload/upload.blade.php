<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'User Upload Prescription') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
</head>
<body>
    <div id="app">
       <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!--Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        Hello User
                    </a>
                </div>

               <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li><a href="{{ url('file') }}">Upload Prescription</a></li>
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
		<br>
		<br>
		<div class="container"> 
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2>Upload Your Prescription</h2>
					
				</div>
				<div class="panel-body">
					@if (count($errors)>0)
					<div class="alert alert-danger">
						<strong>Oops !</strong> There were some problem with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{$error}}</li>
							@endforeach
						</ul>
					</div>
					@endif

					@if($message = Session::get('success'))

					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert"></button>
						<strong>{{ $message }}</strong>
						
					</div>

					<img src="/upload/{{ Session::get('path') }}" width="400px" height="600px">
					@endif
					@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
					<form action="{{ route('upload.file')}}" enctype="multipart/form-data" method="post">
					{{csrf_field()}}
					<div class="row">
						<div class="col-md-12">
						<input type="File" name="image">
                        <input type="hidden" name="usr_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="usr_email" value="{{ Auth::user()->email }}">

						</div>
						<div class="col-md-12">
						<input type="submit" name="Upload">
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>


		<!--
		<div class="col-lg-offset-4 col-lg-4">
		<center><h1>Upload a File</h1></center>

		<form action="{{ route('upload.file')}}" enctype="multipart/form-data" method="post">
		{{csrf_field()}}
			<input type="File" name="image">
			<br>
			<input type="submit" name="Upload">
				
		</form>
			
		</div>

		<div class="row">
			<h2> Show file</h2>
			<img src="{{ asset('storage/upload/sa.jpeg')}}">
		</div>
	-->

</body>
</html>
