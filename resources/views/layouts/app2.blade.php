<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="images/favicon.ico">

    <title>User Home</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Notifiacatio  -->
    <style type="text/css">
        .badge-notify{
           background:#d83535;
           position:relative;
           top: -8px;
           
          }
    </style>
    

     <!-- End Notifiacatio  -->
   


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
                        <li><a href="{{ url('recentupload') }}">Recent Upload</a></li>
 
 <!--SHOW NOTIFICATIONS. <span class="badge badge-notify"></span> -->
                       
  

                        
 <!-- END SHOW NOTIFICATIONS.-->

                        <li><a href="{{ url('purchasehistory') }}">Purchase History</a></li>
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
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
                        @endif
                        
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
   
</body>
</html>

<script>

        $(document).ready(function () {
            var badge = $(this).find(".badge");
            var count = 1;

            if (count > 0) {
                badge.text(count);
            } else {
                badge.hide();
            }
        });

        $(document).on("click", ".like-btn", function(e) {
            e.preventDefault();

            var $label = $(this).find('.text'),
                $badge = $(this).find('.badge'),
                count = Number($badge.text()),
                active = $(this).hasClass('active');

            $label.text(active ? 'Like' : 'Liked');
            $badge.text(active ? count * 0 : count * 0);
            $(this).toggleClass('active');
                        
                        
        });
    </script>
