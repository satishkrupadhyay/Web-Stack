
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
                         <a href="{{ route('welcome') }}" class="navbar-brand" style="font-weight: bold; font-family:Seravek; color:#fff; font-size: 24px; margin-top:15px;" id="jiv">Jivoni</a>

                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">

                            <li>@if (Route::has('login'))
                                    @if (Auth::check())
                                         <a href="{{ url('/home') }}"><b>DASHBOARD</b></a>
                                    @else
                                    <a href="{{ url('/login') }}" class="" data-toggle="modal" data-target="#loginmodal" style="text-transform:uppercase;"><b>SignUp/Login</b></a></li>
                                    @endif
                                @endif

                            <li><a href="#pricing" class="" style="text-transform:uppercase;"><b>Search</b></a></li>
                            <li><a href="#downloadApps" class="" style="text-transform:uppercase;"><b>Download</b></a></li>
                            <li><a href="#description_second" class="" style="text-transform:uppercase;"><b>About</b></a></li>
                            <li><a href="{{ url('/pharmlogin') }}" class="" data-toggle="modal" data-target="#pharmlogin" ><b>Pharmacy?</b></a></li>

                        </ul>

                    </div>
                </div>
            </div>  <!--end of navbar--> 
        </header>
            <!-- Modal 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Login/SignUp</h4>
            </div>
            <div class="modal-body">
                <a class="btn btn-primary" href="{{ url('/login') }}" data-toggle="modal" data-target="#loginmodal" data-dismiss="modal">
                    Enter as USER
                </a>
                <a style="float: right;" class="btn btn-primary" href="{{ url('/pharmlogin') }}"data-toggle="modal" data-target="#pharmlogin" data-dismiss="modal">
                    Enter as PHARMACY
                </a>

            </div>
            <div class="modal-footer">
                <button  style="display: block; margin: 0 auto; height:50px; width:80px;" type="button" class="btn btn-primary btn-xs" data-dismiss="modal" >Close</button>
                
            </div>
        </div>  /.modal-content 
    </div> < /.modal-dialog 
</div> <! /.modal -->

<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            

         <!--   <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>-->
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

<div class="modal fade" id="pharmlogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            

          <!--  <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>-->
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->