     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });

     var userLogin = $('#userLogin');

     $('#userLogin').on('submit', function(event) {

       event.preventDefault();        
        var e_flag = false;
        var p_flag = false;

        var postData = 
        {
            'email' : $('input[name="email"]').val(),
            'password': $('input[name="password"]').val(),
            'remember' : $('input[name="remember_user"]').is(':checked'),
        }

        var filter = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;

        if( $('#login_email').val().trim() == '' ){
            $('#e_div').html('<img src="images/if_info.png" alt="" /> Required');
            $('#login_email').addClass('borderred');
            //event.preventDefault();
        } else {
            $('#e_div').html('');
            $('#login_email').removeClass('borderred');
            //event.preventDefault();
            e_flag = true;
        }


        if( $('#login_password').val().trim() == '' ) {
            $('#p_div').html('<img src="images/if_info.png" alt="" /> Required');
            $('#login_password').addClass('borderred');
        } else {
            $('#p_div').html('');
            $('#login_password').removeClass('borderred');
            p_flag = true;
        }


      if( e_flag && p_flag ) {
        $.ajax({
                url: "/ajax-login-check-user",
                type: 'GET',
                data: postData,

                success: function(response) {

                    if( response == "notfound" ) {
                        $('#e_div').html('<img src="images/if_info.png" alt="" /> Looks like you are not registered.');
                    } else if( response == "notverified" ) {
                        $('#e_div').html('<img src="images/if_info.png" alt="" /> Phone not yet verified <a href="#" id="verify_now">Verify now</a>');
                    } else if( response == "denied" ) {
                        $('#e_div').html('<img src="images/if_info.png" alt="" /> Sorry! Wrong credentials');
                    } else {
                        window.location.href = '/home';
                    }

                    
                }
            });

        e.stopImmediatePropagation();
      }

     });


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
            $('#pe_div').html('<img src="images/if_info.png" alt="" /> Required');
            $('#p_email').addClass('borderred');
            event.preventDefault();
      } else if( !filter.test($('#p_email').val()) ) {
            $('#pe_div').html('<img src="images/if_info.png" alt="" /> Invalid E-mail');
            $('#p_email').addClass('borderred');
            event.preventDefault();
      } else {
            $('#pe_div').html('<img src="images/if_tick.png" alt="" /> Looks great');
            $('#p_email').removeClass('borderred');
            event.preventDefault();
            pe_flag = true;
      }


      if( $('#p_password').val() == '' ) {
            $('#pp_div').html('<img src="images/if_info.png" alt="" /> Required');
            $('#p_password').addClass('borderred');
            event.preventDefault();
      } else {
            $('#pp_div').html('<img src="images/if_tick.png" alt="" /> Looks great');
            $('#p_password').removeClass('borderred');
            event.preventDefault();
            pp_flag = true;
      }

      if( pe_flag && pp_flag ) {
        $.ajax({
                url: "/ajax-login-check-pharmacy",
                type: 'GET',
                data: postData,

                success: function(response) {   

                    if( response == "notfound" ) {
                        $('#pe_div').html('<img src="images/if_info.png" alt="" /> Looks like you are not registered.');
                    } else if( response == "denied" ) {
                        $('#pe_div').html('<img src="images/if_info.png" alt="" /> Sorry! Wrong credentials');
                    } else {
                        window.location.href = '/admin';
                    }



                    
                }
            });

        e.stopImmediatePropagation();
      }

     });
    
    $('#drug').on('keyup', function() {

        $.ajax({
                url: "/ajax-live-search",
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
