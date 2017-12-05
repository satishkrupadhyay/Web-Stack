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
                                    <a href="#" class="" data-toggle="modal" data-target="#loginmodal" style="text-transform:uppercase;"><b>Login</b></a></li>
                                    @endif
                                @endif

                            <li><a href="#" id="search" class="" style="text-transform:uppercase;"><b>Search</b></a></li>
                            <li><a href="#downloadApps" class="" style="text-transform:uppercase;"><b>Download</b></a></li>
                            <li><a href="#description_second" class="" style="text-transform:uppercase;"><b>About</b></a></li>
                            <li><a href="#" class="" data-toggle="modal" data-target="#pharmlogin" ><b>Pharmacy?</b></a></li>

                        </ul>

                    </div>
                </div>
            </div>  

             <div class="col-md-6 col-md-offset-3">
                        <form id="searchForm">
                            <input type="text" name="drug" class="form-control" placeholder="Type anything..." id="drug">
                        </form>
                        <div id="result" style="background: white; padding: 5px 5px; border-radius: 5px; display: none;">
                           
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
                <button type="submit" class="btn btn-primary btn-custom" id="login_submit">
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

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary btn-custom" id="p_submit" >
                    Login
                </button>

                
            </div>
        </div>
    </form>

</div>

        </div> 
    </div> 
</div> 


<script type="text/javascript">
    
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });


     var userLogin = $('#userLogin');

     $('#userLogin').on('submit', function(event) {

       
        
        var e_flag = false;
        var p_flag = false;

        var postData = 
        {
            'email' : $('input[name="email"]').val(),
            'password': $('input[name="password"]').val(),
            'remember' : $('input[name="remember_user"]').is(':checked'),
        }


        var filter = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;

        if( $('#login_email').val() == '' ){
            $('#e_div').html('<img src="images/if_cross.png" alt="" /> required');
            $('#login_email').addClass('borderred');
            event.preventDefault();
      } else if( !filter.test($('#login_email').val()) ) {
            $('#e_div').html('<img src="images/if_cross.png" alt="" /> invalid');
            $('#login_email').addClass('borderred');
            event.preventDefault();
      } else {
            $('#e_div').html('<img src="images/if_tick.png" alt="" /> okay');
            $('#login_email').removeClass('borderred');
            event.preventDefault();
            e_flag = true;
      }



      if( $('#login_password').val() == '' ) {
            $('#p_div').html('<img src="images/if_cross.png" alt="" /> required');
            $('#login_password').addClass('borderred');
            event.preventDefault();
      } else {
            $('#p_div').html('<img src="images/if_tick.png" alt="" /> okay');
            $('#login_password').removeClass('borderred');
            event.preventDefault();
            p_flag = true;
      }


      if( e_flag && p_flag ) {
        $.ajax({
                url: "{{ Route('ajax.login.check') }}",
                type: 'GET',
                data: postData,

                success: function(response) {


                    if( response == 1 ) {
                        $('#e_div').html('<img src="images/if_cross.png" alt="" /> Sorry! E-mail id not found');
                        $('#login_email').addClass('borderred');
                    } else if( response == 2 ) {
                        $('#e_div').html('<img src="images/if_cross.png" alt="" /> Sorry! Wrong credentials');
                        $('#login_email').addClass('borderred');
                    } else {
                        if( response == 'passed' ) {
                             window.location.href = '/home';
                        } else {
                            $('#e_div').html('<img src="images/if_cross.png" alt="" /> Log in error');
                            $('#login_email').addClass('borderred');
                        }
                    }

                    
                }
            });

        e.stopImmediatePropagation(); // to prevent ajax firing twice
      }



     });



     //Pharmacy login script


      var pharmacyLogin = $('#pharmacyLogin');

     $('#pharmacyLogin').on('submit', function(event) {

       
        
        var pe_flag = false;
        var pp_flag = false;

        var postData = 
        {
            'email' : $('#p_email').val(),
            'password': $('#p_password').val(),
            'remember' : $('input[name="remember_pharm"]').is(':checked'),
        }


        var filter = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;

        if( $('#p_email').val() == '' ){
            $('#pe_div').html('<img src="images/if_cross.png" alt="" /> required');
            $('#p_email').addClass('borderred');
            event.preventDefault();
      } else if( !filter.test($('#p_email').val()) ) {
            $('#pe_div').html('<img src="images/if_cross.png" alt="" /> invalid');
            $('#p_email').addClass('borderred');
            event.preventDefault();
      } else {
            $('#pe_div').html('<img src="images/if_tick.png" alt="" /> okay');
            $('#p_email').removeClass('borderred');
            event.preventDefault();
            pe_flag = true;
      }



      if( $('#p_password').val() == '' ) {
            $('#pp_div').html('<img src="images/if_cross.png" alt="" /> required');
            $('#p_password').addClass('borderred');
            event.preventDefault();
      } else {
            $('#pp_div').html('<img src="images/if_tick.png" alt="" /> okay');
            $('#p_password').removeClass('borderred');
            event.preventDefault();
            pp_flag = true;
      }


      if( pe_flag && pp_flag ) {
        $.ajax({
                url: "{{ Route('ajax.login.check.pharmacy') }}",
                type: 'GET',
                data: postData,

                success: function(response) {

                    if( response == 1 ) {
                        $('#pe_div').html('<img src="images/if_cross.png" alt="" /> Sorry! E-mail id not found');
                        $('#p_email').addClass('borderred');
                    } else if( response == 2 ) {
                        $('#pe_div').html('<img src="images/if_cross.png" alt="" /> Sorry! Wrong credentials');
                        $('#p_email').addClass('borderred');
                    } else {
                        if( response == 'passed' ) {
                             window.location.href = '/admin';
                        } else {
                            $('#pe_div').html('<img src="images/if_cross.png" alt="" /> Log in error');
                            $('#p_email').addClass('borderred');
                        }
                    }

                    
                }
            });

        e.stopImmediatePropagation(); // to prevent ajax firing twice
      }



     });

</script>

<script type="text/javascript">
    
    $('#drug').on('keyup', function() {

        $.ajax({
                url: "{{ Route('ajax.live.search') }}",
                type: 'GET',
                data: 'name=' + $(this).val().trim(),
                dataType: 'json',

                success: function(response) {

                    var toAppend = '';

                    if( response == '' ) {
                        
                        toAppend += 'No results found';

                    } else {
                        $.each(response, function(k, v) {

                        toAppend += 'Brand name: ' + v.brand_name + '<br>';
                        toAppend += 'Generic name: ' + v.generic_name + '<br>';
                        toAppend += 'Category name: ' + v.category_name + '<br>';
                        toAppend += '<hr>';
                        
                        });
                    }

                    

                    $('#result').show().html('<p>' + toAppend + '</p>');
                    
                }
            });

    });

    $('#drug').on('focusout', function() {

        $('#result').html('').hide();

    });




</script>