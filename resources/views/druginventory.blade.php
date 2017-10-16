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
                    <a class="navbar-brand" href="{{ url('/admin') }}">
                         Hello {{Auth::user()->store_name}}
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
                        <li><a href="{{ url('pharmrecent') }}">Past Orders</a></li>
                        <li><a href="{{ url('admin') }}">Pending Orders</a></li>
                        <li><a href="{{ url('ViewDrugdetail') }}">View Drug Detail</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{Auth::user()->store_name}} <span class="caret"></span>
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

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="numeric" class="form-control" name="price" value="{{ old('price') }}" placeholder="16.50" required>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        <div class="form-group">
                            <label for="manufacturer" class="col-md-4 control-label">Manufacturer</label>

                            <div class="col-md-6">
                                <input id="manufacturer" type="text" class="form-control" name="manufacturer" value="{{ old('manufacturer') }}" placeholder="e.g.  Glaxosmithkline Pharmaceuticals Ltd" required>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="exp_date" class="col-md-4 control-label">Expiry Date</label>

                            <div class="col-md-6">
                                <input id="exp_date" type="Date" class="form-control" name="exp_date" value="{{ old('exp_date') }}" placeholder=" Hello Wprld" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mfg_date" class="col-md-4 control-label">Manufactured Date</label>

                            <div class="col-md-6">
                                <input id="mfg_date" type="Date" class="form-control" name="mfg_date" value="{{ old('mfg_date') }}" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dosage" class="col-md-4 control-label">Dosage</label>

                            <div class="col-md-6">
                                <input id="dosage" type="text" class="form-control" size="10" name="dosage" value="{{ old('dosage') }}" placeholder="e.g. 0-500 mg/ml/gm" required >
                                @if ($errors->has('dosage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dosage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="type" class="col-md-4 control-label">Drug Type</label>

                            <div class="col-md-6">
                                <select id ="type" class = "form-control" name="type" value="{{ old('type') }}" required>
                                      <option value="tablets">Tablets</option>
                                      <option value="syrup">Syrup</option>
                                      <option value="gel">Gel</option>
                                      <option value="injection">Injection</option>
                                      <option value="capsules">Capsules</option>
                                </select>
                                
                            </div>
                        </div>

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
