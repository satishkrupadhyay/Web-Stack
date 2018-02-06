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


        if( $('#name').val() == '' ){

            $('#n').html('<img src="images/if_info.png" alt="" /> Required');
            $('#name').addClass('borderred');
            event.preventDefault();
        } else {
            $('#n').html('<img src="images/if_tick.png" alt="" /> Looks great');
            $('#name').removeClass('borderred');
        }


        var filter = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;

        if( $('#email').val() == '' ){
            $('#e').html('<img src="images/if_info.png" alt="" /> Required');
            $('#email').addClass('borderred');
            event.preventDefault();
        } else if( !filter.test($('#email').val()) ) {
            $('#e').html('<img src="images/if_info.png" alt="" /> Invalid E-mail');
            $('#email').addClass('borderred');
            event.preventDefault();
        } else {

            var emailFlag = 0;
            
            $.ajax({
                url: "/ajax-check-unique-email",
                type: 'GET',
                data: 'email=' + $('#email').val(),

                success: function(response) {
                    if ( response == 1 ) {
                        $('#e').html('<img src="images/if_info.png" alt="" /> E-mail already exists');
                        $('#email').addClass('borderred');
                        emailFlag = 1;
                    } else if( response == 2 ) {
                     $('#e').html('<img src="images/if_tick.png" alt="" /> Looks great');
                     $('#email').removeClass('borderred');
                     emailFlag = 2;
                 }
             },
             async: false,
         });

        }

        if( $('#password').val() == '' ){
            $('#p').html('<img src="images/if_info.png" alt="" /> Required');
            $('#password').addClass('borderred');
            event.preventDefault();
        } else {
            $('#p').html('<img src="images/if_tick.png" alt="" /> Looks great');
            $('#password').removeClass('borderred');
        }

        if( $('#phone').val() == '' ){
            $('#ph').html('<img src="images/if_info.png" alt="" /> Required');
            $('#phone').addClass('borderred');
            event.preventDefault();
        } else if( $('#phone').val().length != 10 ) {
            $('#ph').html('<img src="images/if_info.png" alt="" /> Invalid Phone');
            $('#phone').addClass('borderred'); 
            event.preventDefault();  
        } else {
            var phoneFlag = 0;
            $.ajax({
                url: "/ajax-check-unique-phone",
                type: 'GET',
                data: 'phone=' + $('#phone').val(),

                success: function(response) {
                    if ( response == 1 ) {
                        $('#ph').html('<img src="images/if_info.png" alt="" />  Phone already exists');
                        $('#phone').addClass('borderred');
                        phoneFlag = 1;
                    } else {
                     $('#ph').html('<img src="images/if_tick.png" alt="" /> Looks great');
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

            var options = 
            {
                hashTracking : false,
                closeOnEscape : false,
                closeOnOutsideClick : false,
            };

            var init = $('[data-remodal-id=modal]').remodal(options);
            init.open();

            var first_name = name.split(' ')[0];

            var subString = phone.slice(-4);
            $('#partial_phone').html('******' + subString);

            data = 'phone=' + phone + '&name=' + name + '&email=' + email + '&address=' + address + '&password=' + password + '&user_locality=' + user_locality + '&first_name=' + first_name;

            $.ajax({
                url: "/ajax-send-otp",
                type: 'GET',
                data: data,
                beforeSend: function() {
                    $('#submit').html('wait...');
                },
                success: function(response) {
                    var otp = response.otp;
                    $('#submit').html('REGISTER');
                },
                async: false,
            });

            event.preventDefault();

        }
    }

});

    
    function redirectSuccess() {
        window.location.href = "/";
    }

    $('#remodal-confirm').click('submit', function() {

        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var address = $('#address').val();
        var user_locality = $('#user_locality').val();
        var phone = $('#phone').val();

        var otp_entered = $('#otp_entered').val();

        data = 'phone=' + phone + '&name=' + name + '&email=' + email + '&address=' + address + '&password=' + password + '&user_locality=' + user_locality + '&otp_entered=' + otp_entered; 

        $.ajax({
            url: "/ajax-verify-otp",
            type: 'GET',
            data: data,

            success: function(response) {
                if( response == 'right' ) {

                    $('#remodal').html('');
                    $('#remodal').html('<img id="success_img" src="images/otp_verified.gif" /><br><br><h5 class="high_five">High five! You can login now &nbsp;&nbsp;</h5><button style="min-width: 71px; padding: 4px 0;" onclick = "redirectSuccess()" class="remodal-cancel">OK</button>').fadeIn();
                } else {
                    $('#invalid_otp').html('');
                    $('#invalid_otp').html('<p style="color: red; font-size: 12px; margin-right: 18px; font-style: italic;">Invalid OTP</p>');
                }
            },
            async: false,
        });

        return false;
    });



    $('#name').on('focusout', function(){
        if( $('#name').val() == '' ) {
            $('#submit').prop('disabled', true);
            $('#n').html('<img src="images/if_info.png" alt="" /> Required');
            $(this).addClass('borderred');
        } else {     
            $('#submit').prop('disabled', false);
            $('#n').html('<img src="images/if_tick.png" alt="" /> Looks great');
            $(this).removeClass('borderred');

        }
        
    });

    $('#email').on('focusout', function(){

        var filter = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;

        if( $('#email').val() == '' ) {
            $('#submit').prop('disabled', true);
            $('#e').html('<img src="images/if_info.png" alt="" /> Required');
            $(this).addClass('borderred');    
        } else if( !filter.test($('#email').val()) ){
            $('#submit').prop('disabled', true);
            $('#e').html('<img src="images/if_info.png" alt="" /> Invalid E-Mail');
            $(this).addClass('borderred'); 
        } else {

            $.ajax({
                url: "/ajax-check-unique-email",
                type: 'GET',
                data: 'email=' + $(this).val(),

                success: function(response) {
                    if (response == 1) {
                        $('#submit').prop('disabled', true);
                        $('#e').html('<img src="images/if_info.png" alt="" />  E-mail already exists');
                        $('#email').addClass('borderred');
                    } else {
                     $('#submit').prop('disabled', false);
                     $('#e').html('<img src="images/if_tick.png" alt="" /> Looks great');
                     $('#email').removeClass('borderred');
                 }
             }
         });

        }
        
    });


    $('#password').on('focusout', function(){
        if( $('#password').val() == '' ) {
            $('#p').html('<img src="images/if_info.png" alt="" /> Required');
            $(this).addClass('borderred');    
            $('#submit').prop('disabled', true);
        } else {
            $('#p').html('<img src="images/if_tick.png" alt="" /> Looks great');
            $(this).removeClass('borderred');
            $('#submit').prop('disabled', false);
        }
        
    });


    $('#user_locality').on('focusout', function(){
        if( $('#user_locality').val() == '0' ) {
            $('#u').html('<img src="images/if_info.png" alt="" /> Required');
            $(this).addClass('borderred');    

        }
        
    });



    $('#phone').on('focusout', function(){
        if( $('#phone').val() == '' ) {
            $('#ph').html('<img src="images/if_info.png" alt="" /> Required');
            $(this).addClass('borderred');    
            $('#submit').prop('disabled', true);
        } else if( $('#phone').val().length != 10 ) {
            $('#ph').html('<img src="images/if_info.png" alt="" /> Invalid Phone');
            $(this).addClass('borderred');   
            $('#submit').prop('disabled', true); 
        } else {
            $.ajax({
                url: "/ajax-check-unique-phone",
                type: 'GET',
                data: 'phone=' + $(this).val(),

                success: function(response) {
                    if (response == 1) {
                        $('#ph').html('<img src="images/if_cross.png" alt="" />  Phone already exists');
                        $('#phone').addClass('borderred');
                        $('#submit').prop('disabled', true);
                    } else {
                     $('#ph').html('<img src="images/if_tick.png" alt="" /> Looks great');
                     $('#phone').removeClass('borderred');
                     $('#submit').prop('disabled', false);
                 }
             }
         });
        }
        
    });
    


    $('#userLogin').on('click', '#verify_now', function() {
        var options = 
        {
            hashTracking : false,
            closeOnEscape : false,
            closeOnOutsideClick : false,
        };



        var email = $('#login_email').val();
        $('#loginmodal').modal('hide');

        data = 'phone=&name=&email='+ email +'&address=&password=&user_locality=&first_name=&isVerified=true';

        $.ajax({
            url: "/ajax-send-otp",
            type: 'GET',
            data: data,
            dataType: 'json',
            beforeSend: function() {
                $('#login_submit').html('Processing');
            },
            success: function(response) {
                var init = $('[data-remodal-id=modal]').remodal(options);
                init.open();
                var phone = response.response;
                $('#entity').val(phone);
                var subString = phone.slice(-4);
                $('#partial_phone').html('******' + subString);
            },
            async: false,
        });
    });


   // $('#remodal-confirm').click('submit', function() {

   //      var phone = $('#entity').val();
   //      var otp_entered = $('#otp_entered').val();

   //      data = 'phone='+ phone +'&name=&email=&address=&password=&user_locality=&otp_entered=' + otp_entered + '&isVerified=true'; 

   //       $.ajax({
   //          url: "/ajax-verify-otp",
   //          type: 'GET',
   //          data: data,

   //          success: function(response) {
   //              if( response == 'right' ) {

   //                  $('#remodal').html('');
   //                  $('#remodal').html('<img id="success_img" src="images/otp_verified.gif" /><br><br><h5 class="high_five">High five! You can login now &nbsp;&nbsp;</h5><button style="min-width: 71px; padding: 4px 0;" onclick = "redirectSuccess()" class="remodal-cancel">OK</button>').fadeIn();
   //              } else {
   //                  $('#invalid_otp').html('<p style="color: red; font-size: 12px; margin-right: 18px; font-style: italic;">Invalid OTP</p>');
   //              }
   //          },
   //           async: false,
   //      });

   //      return false;
   //  });

   $('#resend_otp').on('click', function() {

    var data = 'phone=' + $('#phone').val();
    $.ajax({
        url: "/ajax-resend-otp",
        type: 'GET',
        data: data,
        dataType: 'json',

        success: function(response) {
            $('#invalid_otp').html('');
            $('#invalid_otp').html('<p style="color: blue; font-size: 12px; margin-right: 18px; font-style: italic;">'+ response.message +'</p>');
        },
    });

    return false;

});
