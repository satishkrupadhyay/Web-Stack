<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Pharmacy</title>
    <link rel="icon" href="images/favicon.ico">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
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
                    <a href="{{ url('/home') }}" class="navbar-brand"><img src="../images/Final Logo3x.png" alt="Logo" style="width:40px; height:40px; margin-top: -10px; "/></a>

                    <a class="navbar-brand" href="{{ url('/home') }}">
                        Hello {{ Auth::user()->store_name }}
                    </a>
                </div>

               @include('layouts.pharm_nav')
               
            </div>
        </nav>

        @yield('content')
    </div>
    <br>
		
    <div class="container" id="my_div">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
    <h3>Profile</h3>
    <hr>
                <div class="row">

                     <!-- left column -->
                  <div class="col-md-3">
                    <div class="text-center">
                      <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                      <h6>Upload a different photo...</h6>
                      
                      <input disabled type="file" class="form-control">
                    </div>
                  </div>

                  
                  
                  <!-- edit form column -->
                  <div class="col-md-9 personal-info">
                    
                    @if(Session::has('success_edit'))
                    <div class="alert alert-info alert-dismissable">
                      <a class="panel-close close" data-dismiss="alert">×</a> 
                      <i class="fa fa-coffee"></i>
                      <strong>Well done! </strong>{{ Session::get('success_edit') }}
                    </div>
                    @endif
                    
                    <form class="form-horizontal" role="form" method="post" action="{{ route('view.pharm.profile') }}">
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Store name</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="{{ $pharmData->store_name }}" name="store_name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Owner name:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="{{ $pharmData->owner_name }}" name="owner_name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Store E-mail:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="{{ $pharmData->store_email }}" name="store_email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Phone:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="{{ $pharmData->phone }}" name="phone">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Address:</label>
                        <div class="col-lg-8">
                          <textarea name="address" class="form-control" name="address">{{ $pharmData->address }}</textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Locality:</label>
                        <div class="col-lg-8">
                          <input class="form-control" type="text" value="{{ $pharmData->locality }}" name="locality">
                        </div>
                      </div>

                       {{ csrf_field() }}

                      <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                          <input type="submit" class="btn btn-primary" value="Save Changes">
                          <span></span>
                          <input type="reset" class="btn btn-default" value="Cancel">
                        </div>
                      </div>
                    </form>
                  </div>

              </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
