<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
        <!-- font awesome -->
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
        <link rel="icon" href="images/favicon.ico">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="css/remodal.css">
        <link rel="stylesheet" type="text/css" href="css/remodal-default-theme.css">
        <script src="js/remodal.min.js"></script>       


       <!-- <script src="js/jquery/jquery.js"></script>-->

        <!-- Bootstrap -->
      <!-- <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">-->
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="css/superslide/superslides.css">
        <link rel="stylesheet" href="css/fancybox/jquery.fancybox.css">
        <link rel="stylesheet" href="css/nivo-lightbox/nivo-lightbox.css">
        <link rel="stylesheet" href="css/themes/default/default.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/animate/animate.css">
        <link rel="stylesheet" href="css/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="css/owl-carousel/owl.theme.css">
        <link rel="stylesheet" href="css/owl-carousel/owl.transitions.css">


        <script src="js/script.js"></script>


        <!-- Include all compiled plugins (below), or include individual files as needed -->
   <!--     <script src="js/bootstrap/bootstrap.min.js"></script>-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="js/fancybox/jquery.fancybox.pack.js"></script>
        <script src="js/nivo-lightbox/nivo-lightbox.min.js"></script>
        <script src="js/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery-easing/jquery.easing.1.3.js"></script>
        <script src="js/superslide/jquery.superslides.js"></script>
        <script src="js/wow/wow.min.js"></script>
       
        <title>Jivoni</title>

        <style type="text/css">

			body {
			padding-right: 0px !important;
			}
			
			.btn-try{
    border: 1px solid #fff;
    border-radius: 50px;
    
    width: 100px;
    padding: .5em;
    height: 40px;
    text-align: center;
    background: transparent;
    font-style: normal;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-left: 5px;
    font-size: 14px;
    font-weight: 300;
    margin-top: 26px;
    
   
}

.btn-try:hover {
    background-color: #d83535;
    color: #fff;
    text-decoration: none;
}

.borderred {
    border: 1px solid red;
}

.otp {
    font-size: 18px;
    text-align: center;
    color: white;
    font-weight: 400; 
}

.otp_pass {
    color: white;
    font-weight: 400;
    font-size: 12px;
    text-align: center;
    margin: 5px;
}

.otp_entered {
    text-align: center;
    width: 27%;
    margin: 0 auto;
}

	</style>
    </head>
    <body>
        <!-- @include('layouts.master')
    
      <!--  <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Login</a>
                    <a href="https://laracasts.com">Signup</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Test</a>
                    <a href="https://github.com/laravel/laravel">Test</a>
                </div>
            </div>
        </div>

 -->


 <div class='preloader'><div class='loaded'>&nbsp;</div></div>
       @include('partials.header')

        <section id="homea">
            <div id="bgimage" class="header-image">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-sm-4 col-xs-12" style="margin-top:-50px;">
                            <div class="iphone center-content wow fadeInLeft" data-wow-duration="1s">
                                <img src="images/iphone-1.png" style="width:55%; height:auto; "alt="" />
                            </div>
                        </div>

                        <div class="col-sm-5 col-xs-12 heading-text welcomeHeader" style="margin-left: -73px" >

                            <div class="single_home_content wow zoomIn" data-wow-duration="1s">

                                <h2 style=" color: #fff; ">Introducing <b>JIVONI</b> </h2>
                                <p class="bannerDescription">Now get your medicines delivered at your doorstep. <b>HASSLE FREE.</b><br>Because we <b>CARE.</b></p>
                               <!-- <div class="button" style="margin-top:-50px;margin-left:-20px;">
                                    <a href="#downloadApps" class="btn">Download APP</a>
                                    <a href="#video" class="btn white-btn youtube-media"><i class="fa fa-play"></i> Watch video</a>
                                </div>-->
                            </div>
                        </div>

                        <div class="container-fluid">
                        <div class="col-sm-3 col-xs-12 " style="margin-top:-50px;" id="otpDiv">
                            <div id="formDiv" >
                           <h3 style="color:#FFF"> Register Yourself. It's FREE</h3><br>
                            <form class="form-horizontal" style=" color: #fff;" id="registerForm" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                           

                                <input type="text" class="form-control" name="name" placeholder="Name" id="name">
                                <div style="margin-top: 4px;" id="n">
                                </div>

                        </div>

                       
                           <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label>-->

                              <div class="form-group">
                                <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                                <div style="margin-top: 4px;" id="e">
                                  
                                </div>

                            </div>
                            
                     

                        
                         <!--   <label for="password" class="col-md-4 control-label">Password</label>-->

                              <div class="form-group">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password">

                                <div style="margin-top: 4px;" id="p">
                                   
                                </div>

                               
                            </div>
                            

                        <div class="form-group">
                          <!--  <label for="address" class="col-md-4 control-label">Address</label>-->
                            
                                <textarea id="address" rows="3"  class="form-control" name="address" value="{{ old('address') }}" placeholder="Address"></textarea>

                                <div style="margin-top: 4px;" id="a">
                                
                                </div>
                        </div>
                        <div class="row">
                            <div class="form-group" style="margin-bottom: 0">
                        <div class="col-md-6" style="margin-bottom: 14px;">
                          
                                  
                            <select class="form-control" id="user_locality" name="user_locality" id="user_locality">
                                <option value="Guwahati" selected>Guwahati</option>
                                <option value="Mangoldoi">Mangoldoi</option>
                            </select>
                            <div style="margin-top: 4px;" id="u">
                                  
                                </div>
                        </div> 
                    
                       <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" size="10" name="phone" placeholder="Phone Number" maxlength="10">
                                <div style="margin-top: 4px;" id="ph">
                                  
                                </div>
                                
                           
                        
                        </div>
                    </div>
                    </div>

                        <div class="form-group">
                              <center> 
                                <button id="submit" type="submit" class="btn-try" style="">
                                    Register
                                </button>
                            </center>
                        </div>

                    </form>
                </div>

                <div data-remodal-id="modal" role="dialog">
                  <div>
                    <h2 id="modal1Title">One Time Password (OTP)</h2>
                    <p id="modal1Desc">
                      Please enter the OTP sent to your
                    </p>
                    <p>Registered Mobile Number <strong>******9999</strong></p>
                    <input type="text" name="otp_entered" id="otp_entered" placeholder="999999" class="form-control otp_entered" maxlength="6">
                  </div>
                  <br>
                  <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
                  <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
                </div>

                </div>
                </div>
                        

                    </div> <!-- end of row -->
                </div> <!-- end of container -->

                <div class="scrolldown">
                    <a href="#downloadApps" class="scroll_btn"></a>
                </div>

            </div>

        </section>


     <!--   <section id="works_2">
            <div class="container">
                <div class="row">
                    <div class="works_2_content">
                        <div class="col-sm-4 col-xs-12">
                            <div class="works_2_iphone center-content">
                                <img src="images/iphone1.png" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-8 col-xs-12 top-margin">
                            <div class="row">
                                <div class="single_works_2_content wow fadeInRight" data-wow-duration="1.5s">
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="single_works_2_text">
                                            <i class="fa fa-crop"></i>
                                            <div class="text_deatels">
                                                <h3>Clean and Responsive</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas at nibh orci.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="single_works_2_text">
                                            <i class="fa fa-cube"></i>
                                            <div class="text_deatels">
                                                <h3>Clean and Responsive</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas at nibh orci.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="single_works_2_text">
                                            <i class="fa fa-magic"></i>
                                            <div class="text_deatels">
                                                <h3>Clean and Responsive</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas at nibh orci.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="single_works_2_text">
                                            <i class="fa fa-code-fork"></i>
                                            <div class="text_deatels">
                                                <h3>Clean and Responsive</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas at nibh orci.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="single_works_2_text">
                                            <i class="fa fa-rocket"></i>
                                            <div class="text_deatels">
                                                <h3>Clean and Responsive</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas at nibh orci.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="single_works_2_text">
                                            <i class="fa fa-database"></i>
                                            <div class="text_deatels">
                                                <h3>Clean and Responsive</h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas at nibh orci.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

        <!-- Description Section 

        <section id="descriotion">
            <div class="container">
                <div class="row main_description">
                    <div class="col-sm-6 col-xs-12">
                        <div class="left_desc_img center-content wow fadeInLeft" data-wow-duration="1.5s">
                            <img src="images/iphone3.png" alt="" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="right_desc_text top-margin wow fadeIn" data-wow-duration="1.5s">
                            <h1>Description First Layout</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer tincidunt efficitur vestibulum. Phasellus nisl leo, congue eu malesuada lobortis, fringilla et nulla.</p>

                            <div class="right_desc_bottom_text">
                                <div class="right_single_bottom_text">
                                    <i class="fa fa-shield"></i>
                                    <div class="right_bottom_description">
                                        <h6>Hundreds of Icons</h6>
                                        <p>Ipsum dolor sit amet, consectetur adipiscing elit Integer tincidunt.</p>
                                    </div>
                                </div>

                                <div class="right_single_bottom_text">
                                    <i class="fa fa-css3"></i>
                                    <div class="right_bottom_description">
                                        <h6>Hundreds of Icons</h6>
                                        <p>Ipsum dolor sit amet, consectetur adipiscing elit Integer tincidunt.</p>
                                    </div>
                                </div>

                                <div class="right_single_bottom_text">
                                    <i class="fa fa-file-text"></i>
                                    <div class="right_bottom_description">
                                        <h6>Hundreds of Icons</h6>
                                        <p>Ipsum dolor sit amet, consectetur adipiscing elit Integer tincidunt.</p>
                                    </div>
                                </div>

                                <div class="right_single_bottom_text">
                                    <i class="fa fa-server"></i>
                                    <div class="right_bottom_description">
                                        <h6>Hundreds of Icons</h6>
                                        <p>Ipsum dolor sit amet, consectetur adipiscing elit Integer tincidunt.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

        <!-- Description Second Section -->

        


        <!-- Video Section 

        <section id="video">
            <div class="video_overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="video_text center-content">
                                
                                 4:3 aspect ratio 
                                <div class="embed-responsive embed-responsive-4by3">
                                  <iframe class="embed-responsive-item" style="border-radius:10px;" width="640" height="480" src="https://drive.google.com/file/d/0B2zFuMt6Wn9lT0ZrWFF6QjhYVm8/preview" frameborder="0" allowfullscreen></iframe>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </section> -->

        <!-- Our Testimonial  

        <section id="testimonial">
            <div class="container">
                <div class="row">
                    <div class="main_testimonial_text center-content">
                        <div class="col-md-12 col-sm-12 single_testimonial_text item">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris quis nostrud nisi ut aliquip ex ea commodo consequat.</p>
                            <a href="">Jhone Due, Photographer</a>
                        </div>
                        <div class="col-md-12 col-sm-12 single_testimonial_text item">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris quis nostrud nisi ut aliquip ex ea commodo consequat.</p>
                            <a href="">Jhone Due, Photographer</a>
                        </div>
                        <div class="col-md-12 col-sm-12 single_testimonial_text item">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris quis nostrud nisi ut aliquip ex ea commodo consequat.</p>
                            <a href="">Jhone Due, Photographer</a>
                        </div>
                        <div class="col-md-12 col-sm-12 single_testimonial_text item">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris quis nostrud nisi ut aliquip ex ea commodo consequat.</p>
                            <a href="">Jhone Due, Photographer</a>
                        </div>
                        <div class="col-md-12 col-sm-12 single_testimonial_text item">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris quis nostrud nisi ut aliquip ex ea commodo consequat.</p>
                            <a href="">Jhone Due, Photographer</a>
                        </div>
                        <div class="col-md-12 col-sm-12 single_testimonial_text item">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris quis nostrud nisi ut aliquip ex ea commodo consequat.</p>
                            <a href="">Jhone Due, Photographer</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->

    


        <!-- Download Section  -->

        <section id="downloadApps">
            <div class="container">
                <div class="row">
                    <div class="download_heading_text center-content">
                      

                        <div class="down_text_des wow fadeInUp" data-wow-duration="1.5s">
                            
                            <img src="images/1.png" alt="" />
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="description_second">
            <div class="container">
                <div class="row">
                    <div class="main_description_second_contant">
                        <div class="col-md-6 col-sm-6 wow fadeIn" data-wow-duration="1.5s">
                            <div class="second_heading_text top-margin">
                                <h1>The Health App YOU always NEEDED</h1>
                                <p>Getting your medicines made easy for all.</p>
                            </div>

                            <div class="second_bottom_text">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="second_single_text">
                                            <i class="fa fa-car" style="color:#d83535;"></i>
                                            <div class="right_bottom_description">
                                                <h6>Home Delivery</h6>
                                                <p>Get your medicines from the ease of your home.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="second_single_text">
                                            <i class="fa fa-magic" style="color:#d83535;"></i>
                                            <div class="right_bottom_description">
                                                <h6>Ease of use</h6>
                                                <p>User Friendly environment for all.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="second_single_text">
                                            <i class="fa fa-file-text" style="color:#d83535;"></i>
                                            <div class="right_bottom_description">
                                                <h6>Directly Upload your Precription</h6>
                                                <p>Upload and save your prescription to get your medicines.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="second_single_text">
                                            <i class="fa fa-location-arrow" style="color:#d83535;"></i>
                                            <div class="right_bottom_description">
                                                <h6>Location based access</h6>
                                                <p>Get your medicine from your nearest pharamcy.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6 col-sm-6">
                            <div class="right_desc_img center-content wow fadeInRight" data-wow-duration="1.5s">
                                <img src="images/iphone-2.png" alt="" />
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- Subscribe Section  

        <section id="subscribe">
            <div class="subcribe_overlay">
                <div class="container">
                    <div class="row">
                        <div class="subscribe_heading_text center-content">
                            <div class="subscribe_heading_title wow fadeIn" data-wow-duration="1s">
                                <h1>Subscribe Now</h1>
                                <p>Get latest news and offers from us.</p>
                            </div>

                            <div class="subcribe_form center-content">
                                <input type="text" placeholder="Email Address">
                                <input type="submit" text="Subscribe"></i></input>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>-->


        <!-- message section 

        <section id="message">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="message_content">
                            <div class="message_heading_text center-content wow zoomIn" data-wow-duration="1s">
                                <h2>Get in Touch</h2>
                                <p>Have feedback, suggestion, or any thought about our app? Feel free to contact us anytime, we will get back to you in 24 hours.</p>
                            </div>

                            <form action="#" id="formid" class="wow fadeIn" data-wow-duration="2s">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="first name" required="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required="">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Subject">
                                    </div> <!-- end of form-group 

                                    <div class="form-group">
                                        <textarea class="form-control" name="message" rows="8" placeholder="Message"></textarea>
                                    </div>

                                    <div class="center-content">
                                        <input type="submit" value="Submit" class="btn larg-btn">
                                    </div>
                                </div>
                            </form>         
                        </div>
                    </div>
                </div>


            </div> <!-- end of container 
        </section>-->


        @include('partials.footer')



        <!-- START SCROLL TO TOP  -->

        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>

    </body>

    <script type="text/javascript">


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
                url: "{{ Route('ajax.unique.phone') }}",
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

</script>
</html>
