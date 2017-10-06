<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>User Upload Prescription</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
    width: 100%;
}
    </style>
  
</head>
<body>
    <div id="app">
       <nav class="navbar navbar-default navbar-static-top" style="background-color: #e3f2fd;">
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
                        Hello {{ Auth::user()->name }}
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
                        <li><a href="{{ url('purchasehistory') }}">Purchase History</a></li>
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
		<div class="container"> 
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Upload Your Prescription</h4>
					
				</div>
				<div class="panel-body">
					@if (count($errors)>0)
					<div class="alert alert-danger">
						<strong>Oops !</strong> There were some problem with your file.<br><br>
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

					
					@endif
					@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
					<form action="{{ route('upload.file')}}" enctype="multipart/form-data" method="post">
					{{csrf_field()}}
					<div class="row">
						<div class="col-md-10">
						<div class="container">
                            <div class="col-md-9 col-md-offset-1">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input id='urlname' type="text" class="form-control" readonly>
                                        <span class="input-group-btn">
                                            <span class="btn btn-primary btn-file ">
                                                Browse <input type="file" id="imgInp" name="image">
                                            </span>
                                        </span>
                                        
                                    </div>
                                   </br>
                                    <img id='img-upload'/> </br></br>
                                    <input type="hidden" name="usr_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="usr_email" value="{{ Auth::user()->email }}">
                                    <div class="col-md-10 col-md-offset-5">
                                    <input type="submit" name="Upload" class="btn-bs-file btn btn-md btn-primary" value="Upload Prescription">
                                    </div>
                                </div>
                            </div>
                            </div>


                        
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
<script type="text/javascript">
    $(document).ready( function() {
    
        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {
            
            var input = $(this).parents('.input-group').find(':text'),
                log = label;
            
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
        
        });
        
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
        });
        
        $("#clear").click(function(){
            $('#img-upload').attr('src','');
            $('#urlname').val('');
        });
    });
</script>
</body>
</html>
