<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Drug Detail</title>
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
                    <a href="{{ url('/home') }}" class="navbar-brand"><img src="images/Final Logo3x.png" alt="Logo" style="width:40px; height:40px; margin-top: -10px; "/></a>

                    <a class="navbar-brand" href="{{ url('/home') }}">
                        Hello {{ Auth::user()->store_name  }}
                    </a>
                </div>

<<<<<<< HEAD
              <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li><a href="{{ url('pharmrecent') }}">Past Orders</a></li>
                        <li><a href="{{ url('Drugdetail') }}">Add Drug Detail</a></li>
                        <li><a href="{{ url('ViewDrugdetail') }}">View Drug Detail</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-user-circle-o fa-2x " aria-hidden="true"></i>
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
  
                        
                    </ul>
                </div>
=======
               @include('layouts.pharm_nav')
>>>>>>> c79270fbb32b93e1d92157fcd91c348aea5e8796
            </div>
        </nav>

        @yield('content')
    </div>
    <br>
		
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Drug Detail Form</strong></div>

                <div class="panel-body">
                   
                   @if($message = Session::get('success'))

                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"></button>
                        <strong>{{ $message }}</strong>
                        
                    </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('submit.form') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group{{ $errors->has('brandname') ? ' has-error' : '' }}">
                            <label for="brandname" class="col-md-4 control-label">Drug/brand Name</label>

                            <div class="col-md-6">
                                <input id="brandname" type="text" class="form-control" name="brandname" value="{{ old('brandname') }}" placeholder="e.g. Calpol 500 MG" required autofocus >

                                @if ($errors->has('brandname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('brandname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('genericname') ? ' has-error' : '' }}">
                            <label for="genericname" class="col-md-4 control-label">Generic Name</label>

                            <div class="col-md-6">
                                <input id="genericname" type="text" class="form-control" name="genericname" value="{{ old('genericname') }}" placeholder="e.g. Paracetamol" required  >

                                @if ($errors->has('genericname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('genericname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        <div class="form-group">
                            <label for="manufacturer" class="col-md-4 control-label">Manufacturer</label>

                            <div class="col-md-6">
                                <input id="manufacturer" type="text" class="form-control" name="manufacturer" value="{{ old('manufacturer') }}" placeholder="e.g.  Glaxosmithkline Pharmaceuticals Ltd" required>

                                @if ($errors->has('manufacturer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manufacturer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="numeric" class="form-control" name="price" style="width: 30%" value="{{ old('price') }}" placeholder="16.50" required>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dosage" class="col-md-4 control-label">Strength</label>

                            <div class="col-md-3">
                                <input id="strength" type="text" class="form-control" style="width: 50%" name="strength" value="{{ old('strength') }}" placeholder="e.g. 1-10000 " required >
                                @if ($errors->has('dosage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dosage') }}</strong>
                                    </span>
                                @endif      
                           </div>
                           <div class="col-md-3" style="margin-left: -130px">
                                <select id ="strength_unit" class = "form-control" name="strength_unit" style="width: 35%" value="{{ old('strength_unit') }}" required>
                                      <option value="mg">mg</option>
                                      <option value="ml">ml</option>
                                      <option value="gm">gm</option>
                                </select>
                            </div> 
                            
                        </div>

                        <div class="form-group">
                            <label for="type" class="col-md-4 control-label">Drug Type</label>

                            <div class="col-md-6">
                                <select id ="type" class = "form-control" name="type" style="width: 30%" value="{{ old('type') }}" required>
                                      <option value="tablets">Tablets</option>
                                      <option value="syrup">Syrup</option>
                                      <option value="gel">Gel</option>
                                      <option value="injection">Injection</option>
                                      <option value="capsules">Capsules</option>
                                </select>
                                
                            </div>
                        </div>
                        <input type="hidden"  name="pharmacy_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>

                        @if (session('statusreg'))
    <div class="alert alert-success">
        {{ session('statusreg') }}
    </div>
@endif
                    </form>
                    
                   

                
                
                     
                 </div>
            </div>
        </div>
    </div>
</div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

<!-- Scripts for valid price -->
     <script type="text/javascript">

      $("#price").on("input", function(evt) {
       var self = $(this);
       self.val(self.val().replace(/[^0-9\.]/g, ''));
       if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
       {
         evt.preventDefault();
       }
     });

    </script>
});
     <!-- end Scripts for valid price -->

<!-- Scripts for valid strength(only numbers) -->
     <script type="text/javascript">

     $("#strength").on("input",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
    </script>
<!-- end Scripts for valid strength(only numbers) -->
