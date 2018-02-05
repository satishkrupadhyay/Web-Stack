
    $("#phone").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

     $("#otp_entered").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });


    var button = $('#submit');
    var registerform = $('#registerForm');
    

    registerform.on('submit', function(event){

      var name = $('#name').val();
      var email = $('#email').val();
      var password = $('#password').val();
      var address = $('#address').val();
      var user_locality = $('#user_locality').val();
      var phone = $('#phone').val();
    
      
      var postData = {
        'name'    : name,
        'email'    : email,
        'password'    : password,
        'address' : address,
        'user_locality' : user_locality,
        'phone' : phone,
      }

 
      if( $('#name').val() == '' ){
       
        $('#n').html('<img src="images/if_cross.png" alt="" /> required');
        $('#name').addClass('borderred');
        event.preventDefault();
      } else {
        $('#n').html('<img src="images/if_tick.png" alt="" /> okay');
        $('#name').removeClass('borderred');
      }


      var filter = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;

      if( $('#email').val() == '' ){
        $('#e').html('<img src="images/if_cross.png" alt="" /> required');
        $('#email').addClass('borderred');
        event.preventDefault();
      } else if( !filter.test($('#email').val()) ) {
        $('#e').html('<img src="images/if_cross.png" alt="" /> required');
        $('#email').addClass('borderred');
        event.preventDefault();
      } else {

        var emailFlag = 0;
            
            $.ajax({
                url: "{{ Route('ajax.unique.email') }}",
                type: 'GET',
                data: 'email=' + $('#email').val(),

                success: function(response) {
                    if ( response == 1 ) {
                        $('#e').html('<img src="images/if_cross.png" alt="" /> already exists');
                        $('#email').addClass('borderred');
                        emailFlag = 1;
                    } else if( response == 2 ) {
                         $('#e').html('<img src="images/if_tick.png" alt="" /> looks cool. Keep going');
                        $('#email').removeClass('borderred');
                        emailFlag = 2;
                    }
                },
                 async: false,
            });

        }

      if( $('#password').val() == '' ){
        $('#p').html('<img src="images/if_cross.png" alt="" /> required');
        $('#password').addClass('borderred');
        event.preventDefault();
      } else {
        $('#p').html('<img src="images/if_tick.png" alt="" /> okay');
        $('#password').removeClass('borderred');
      }

      if( $('#phone').val() == '' ){
        $('#ph').html('<img src="images/if_cross.png" alt="" /> required');
        $('#phone').addClass('borderred');
        event.preventDefault();
      } else if( $('#phone').val().length != 10 ) {
            $('#ph').html('<img src="images/if_cross.png" alt="" /> not a 10 digit ');
            $('#phone').addClass('borderred'); 
            event.preventDefault();  
        } else {
            var phoneFlag = 0;
            $.ajax({
                url: "{{ Route('ajax.unique.phone') }}",
                type: 'GET',
                data: 'phone=' + $('#phone').val(),

                success: function(response) {
                    if ( response == 1 ) {
                        $('#ph').html('<img src="images/if_cross.png" alt="" />  Phone already exists');
                        $('#phone').addClass('borderred');
                        phoneFlag = 1;
                    } else {
                        console.log("here");
                         $('#ph').html('<img src="images/if_tick.png" alt="" /> looks cool. Keep going');
                        $('#phone').removeClass('borderred');
                        phoneFlag = 2;
                    }
                },
                 async: false,
            });
        }

        event.preventDefault();


    if( emailFlag == 2 && phoneFlag == 2 ) {

      if( name != '' && email != '' && password != '' && phone != '' ) {

        console.log(emailFlag);

    
        var options = 
        {
            hashTracking : false,
            closeOnEscape : false,
            closeOnOutsideClick : false,
        };

        var init = $('[data-remodal-id=modal]').remodal(options);
        init.open();

    
        $(document).on('closing', '.remodal', function (e) {
           if (e.reason == 'cancellation') {
                
                $('#name').val('');
                $('#n').text('');
                $("#n img:last-child").remove()
                $('#email').val('');
                $('#e').text('');
                $("#e img:last-child").remove()
                $('#phone').val('');
                $('#ph').text('');
                $("#ph img:last-child").remove()
                $('#password').val('');
                $('#p').text('');
                $("#p img:last-child").remove()
                $('#address').val('');
                $('#user_locality').val('Guwahati');
                $("#u img:last-child").remove()
                $("#u").text('');
                $('#user_locality').val('Guwahati');
                 $('#address').val('');
                $("#u img:last-child").remove();
                
           }
          });

        event.preventDefault();

      }
  }

  
    });

    $('#name').on('focusout', function(){
        if( $('#name').val() == '' ) {
            $('#submit').prop('disabled', true);
            $('#n').html('<img src="images/if_cross.png" alt="" />  not cool');
            $(this).addClass('borderred');
        } else {     
            $('#submit').prop('disabled', false);
            $('#n').html('<img src="images/if_tick.png" alt="" /> looks cool');
            $(this).removeClass('borderred');

        }
        
    });
    $('#email').on('focusout', function(){

        var filter = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;

        if( $('#email').val() == '' ) {
            $('#submit').prop('disabled', true);
            $('#e').html('<img src="images/if_cross.png" alt="" />  not cool');
            $(this).addClass('borderred');    
        } else if( !filter.test($('#email').val()) ){
            $('#submit').prop('disabled', true);
             $('#e').html('<img src="images/if_cross.png" alt="" />  not cool');
            $(this).addClass('borderred'); 
        } else {
            
            $.ajax({
                url: "{{ Route('ajax.unique.email') }}",
                type: 'GET',
                data: 'email=' + $(this).val(),

                success: function(response) {
                    if (response == 1) {
                        $('#submit').prop('disabled', true);
                        $('#e').html('<img src="images/if_cross.png" alt="" />  e-mail already exists');
                        $('#email').addClass('borderred');
                    } else {
                         $('#submit').prop('disabled', false);
                         $('#e').html('<img src="images/if_tick.png" alt="" /> looks cool. Keep going');
                        $('#email').removeClass('borderred');
                    }
                }
            });

        }
        
    });


    $('#password').on('focusout', function(){
        if( $('#password').val() == '' ) {
            $('#p').html('<img src="images/if_cross.png" alt="" />  not cool');
            $(this).addClass('borderred');    
            $('#submit').prop('disabled', true);
        } else {
            $('#p').html('<img src="images/if_tick.png" alt="" /> looks cool');
            $(this).removeClass('borderred');
            $('#submit').prop('disabled', false);
        }
        
    });


    $('#user_locality').on('focusout', function(){
        if( $('#user_locality').val() == '0' ) {
            $('#u').html('<img src="images/if_cross.png" alt="" /> not cool');
            $(this).addClass('borderred');    
          
        } else {
            $('#u').html('<img src="images/if_tick.png" alt="" /> looks cool');
            $(this).removeClass('borderred');
           
        }
        
    });



    $('#phone').on('focusout', function(){
        if( $('#phone').val() == '' ) {
            $('#ph').html('<img src="images/if_cross.png" alt="" /> required');
            $(this).addClass('borderred');    
            $('#submit').prop('disabled', true);
        } else if( $('#phone').val().length != 10 ) {
            $('#ph').html('<img src="images/if_cross.png" alt="" /> not a 10 digit ');
            $(this).addClass('borderred');   
           $('#submit').prop('disabled', true); 
        } else {
            $.ajax({
                url: "<?php echo Route('ajax.unique.phone'); ?>",
                type: 'GET',
                data: 'phone=' + $(this).val(),

                success: function(response) {
                    if (response == 1) {
                        $('#ph').html('<img src="images/if_cross.png" alt="" />  Phone already exists');
                        $('#phone').addClass('borderred');
                        $('#submit').prop('disabled', true);
                    } else {
                         $('#ph').html('<img src="images/if_tick.png" alt="" /> looks cool. Keep going');
                        $('#phone').removeClass('borderred');
                        $('#submit').prop('disabled', false);
                    }
                }
            });
        }
        
    });

    // var phone_val = $('#phone').val();
    // var subString = phone_val.substr(-3);
    // $('#partial_phone').val(subString);

    console.log("I AM HERE");



