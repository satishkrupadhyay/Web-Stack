<header id="home" class="header navbar-fixed-top">
    <div class="navbar navbar-default main-menu">

        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a href="{{ route('welcome') }}" class="navbar-brand"><img src="images/Final Logo3x.png" alt="Logo" style="width:70px; height:70px; "/></a>
                <a href="{{ route('welcome') }}" class="navbar-brand" style="font-weight: bold; font-family:Lato; color:#fff; font-size: 24px; margin-top:15px;" id="jiv">Jivoni</a>

            </div>


            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    @if(!Auth::guard('admin')->check())
                    @if (Route::has('login'))
                        @if (Auth::check())
                    <li>
                        <a href="{{ url('/home') }}"><b>DASHBOARD</b></a>
                    @else
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="" data-toggle="modal" data-target="#loginmodal" style="text-transform:uppercase;"><b>Login</b></a>
                    </li>
                        @endif
                    @endif
                    @endif

                        <li><a href="#downloadApps" class="" style="text-transform:uppercase;"><b>HOW IT WORKS</b></a></li>
                        <li><a href="#description_second" class="" style="text-transform:uppercase;"><b>About</b></a></li>
                        
                        @if(!Auth::check())
                        @if(Auth::guard('admin')->check())
                        <li>
                            <a href="{{ Route('admin.home') }}" class=""><b>DASHBOARD</b>
                            </a>
                        </li>
                        @else
                        <li>
                            <a href="javascript:void(0)" class="" data-toggle="modal" data-target="#pharmlogin" ><b>PHARMACY</b>
                            </a>
                        </li>
                        @endif
                        @endif

                    </ul>

                </div>
            </div>
        </div>  

    </header>



    <!-- User login modal -->

    <div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">User Login</h4>
                </div>



                <div class="modal-body">

                    <form class="form-horizontal" method="POST" action="{{ route('login') }}" id="userLogin">

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="login_email" type="text" class="form-control" name="email">
                                <div style="margin-top: 4px;" id="e_div">
                                </div>


                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="login_password" type="password" class="form-control" name="password">
                                <div style="margin-top: 4px;" id="p_div">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember_user" id="remember_user"> Remember Me
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}" data-toggle="modal" data-target="#forgot" >
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group ">
                            <center class="form-horizontal">
                                <button type="submit" class="ripple" id="login_submit" style="padding: 5px 49px; font-size: 18px; background: #da3534;">
                                    Login
                                </button>
                            </center>
                        </div>
                    </form>
                </div>


            </div> 
        </div> 
    </div> 

    <div class="modal fade" id="pharmlogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Pharmacy Login</h4>
                </div>

                <div class="modal-body">

                    <form class="form-horizontal" method="POST" action="{{ route('admin.login.submit') }}" id="pharmacyLogin">

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="p_email" type="text" class="form-control" name="email">
                                <div style="margin-top: 4px;" id="pe_div">
                                </div>


                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="p_password" type="password" class="form-control" name="password">

                                <div style="margin-top: 4px;" id="pp_div">
                                </div>


                            </div>
                        </div>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember_pharm" id="remember_pharm"> Remember Me
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}" data-toggle="modal" data-target="#forgot">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>

                        <div class="form-group ">
                            <center class="form-horizontal">
                                <button type="submit" class="ripple" id="p_submit" style="padding: 5px 49px; font-size: 18px; background: #da3534;">
                                    Login
                                </button>
                            </center>
                        </div>




                    </form>

                </div>

            </div> 
        </div> 
    </div> 


    <script src="js/header-script.js"></script>