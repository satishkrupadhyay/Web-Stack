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
    <h3>Change Password</h3>
    <hr>
                <div class="row">
                  
                  
                  <!-- edit form column -->
                  <div class="col-md-12 personal-info">
                    
                    @if(Session::has('message_1'))
                    <div class="alert alert-warning alert-dismissable">
                      <a class="panel-close close" data-dismiss="alert">×</a> 
                      <i class="fa fa-coffee"></i>
                      <strong></strong>{{ Session::get('message_1') }}
                    </div>
                    @endif

                    @if(Session::has('message_2'))
                    <div class="alert alert-warning alert-dismissable">
                      <a class="panel-close close" data-dismiss="alert">×</a> 
                      <i class="fa fa-coffee"></i>
                      <strong></strong>{{ Session::get('message_2') }}
                    </div>
                    @endif

                    @if(Session::has('message'))
                    <div class="alert alert-info alert-dismissable">
                      <a class="panel-close close" data-dismiss="alert">×</a> 
                      <i class="fa fa-coffee"></i>
                      <strong></strong>{{ Session::get('message') }}
                    </div>
                    @endif
                    
                    <form class="form-horizontal" role="form" method="post" action="{{ route('view.pharm.changepass') }}">
                      <div class="form-group">
                        <label class="col-lg-3 control-label">Old Password</label>
                        <div class="col-lg-6">
                          <input class="form-control" type="password" name="old_password" required="true">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-3 control-label">New Password</label>
                        <div class="col-lg-6">
                          <input class="form-control" type="password" name="new_password" required="true">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-3 control-label">Confirm Password</label>
                        <div class="col-lg-6">
                          <input class="form-control" type="password" name="con_password" required="true">
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
