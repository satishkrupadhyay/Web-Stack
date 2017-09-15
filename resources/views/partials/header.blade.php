 

 <header id="home" class="header navbar-fixed-top">
            <div class="navbar navbar-default main-menu">

                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a  href="#home" class="navbar-brand"><img src="images/Asset 34x.png" alt="Logo" width="100px" height="50px"/></a>
                        <!-- <a class="navbar-brand" href="index.html"></a> -->
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>@if (Route::has('login'))
                                    @if (Auth::check())
                                         <a href="{{ url('/home') }}">Home</a>
                                    @else
                                    <a href="" class="" data-toggle="modal" data-target="#myModal"><b>SignUp/Login</b></a></li>
                                 <!--   <a href="{{ url('/login') }}" class="" data-toggle="modal" data-target="#myModal"><b>SignUp/Login</b></a></li> -->
                                   <!-- <button type="button" class="btn btn-primary btn-large" data-toggle="modal" data-target="#myModal">Launch demo modal</button>-->
                                    @endif
                                @endif

                                
                            <li><a href="#description_second" class=""><b>Upload Prescription</b></a></li>
                            <li><a href="#pricing" class=""><b>Search</b></a></li>
                            <li><a href="#downloadApps" class=""><b>Download</b></a></li>
                        </ul>

                    </div>
                </div>
            </div> <!-- end of navbar -->
        </header>
            <!-- Modal -->
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
                <a class="btn btn-primary" href="{{ url('/login') }}">
                    Enter as PHARMACY
                </a>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-xs" data-dismiss="modal" >Close</button>
                
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

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