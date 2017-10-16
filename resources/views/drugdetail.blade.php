<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pharmacy</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico">
  
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

                        <li><a href="{{ url('admin') }}">Pending Orders</a></li>

                        <li><a href="{{ url('Drugdetail') }}">Add Drug Detail</a></li>

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
                <div class="panel-heading"><strong>Added Drug Details</strong></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                
                <!-- <div class="list-group">  -->
                <div class="table-responsive"> 
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Drug ID</th>
                        <th>Drug Name</th>
                        <th>Generic Name</th>
                        <th>Price</th>
                        <th>Manufacturer</th>
                        <th>Exp. Date</th>
                        <th>Mfd. Date</th>
                        <th>Dosage</th>
                        
                        <th>Drug Type</th>
                      </tr>
                    </thead>
                        <tbody>
                           @foreach ($data as $value)

                                <!-- <a href="" class="list-group-item"> 
                                    <li style="list-style-type:none"><b>Drug Name:</b> {{$value->brand_name}}</li> 
                                    <li style="list-style-type:none"><b>Generic name:</b> {{$value->generic_name}}</li> 
                                    <li style="list-style-type:none"><b>Price:</b> {{$value->price}}</li>  
                                    <li style="list-style-type:none"><b>Manufacturer:</b> {{$value->manufacturer}}</li> 
                                    <li style="list-style-type:none"><b>Expiry Date:</b> {{$value->exp_date}}</li>
                                    <li style="list-style-type:none"><b>Manufactured Date:</b> {{$value->mfg_date}}</li>
                                    <li style="list-style-type:none"><b>Dosage:</b> {{$value->dosage}}</li>
                                    <li style="list-style-type:none"><b>Type:</b> {{$value->type}}</li>
                                </a> -->
                                <tr>
                                    <td>{{$value->drug_id}}</td>
                                    <td>{{$value->brand_name}}</td>
                                    <td>{{$value->generic_name}}</td>
                                    <td>{{$value->price}}</td>
                                    <td>{{$value->manufacturer}}</td>
                                    <td>{{$value->exp_date}}</td>
                                    <td>{{$value->mfg_date}}</td>
                                    <td>{{$value->dosage}}</td>
                                    
                                    <td>{{$value->type}}</td>
                                </tr>

                           @endforeach
                           </tbody>
                        </table> 

                    </div> 
                     {{ $data->links() }}

                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
