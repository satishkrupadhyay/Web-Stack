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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        


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
       
        <title>HealthAPP</title>

        
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
                <div class="container">
                    <div class="row">

                        <div class="col-sm-5 col-xs-12">
                            <div class="iphone center-content wow fadeInLeft" data-wow-duration="1s">
                                <img src="images/iphone.png" alt="" />
                            </div>
                        </div>

                        <div class="col-sm-7 col-xs-12 heading-text">
                            <div class="single_home_content wow zoomIn" data-wow-duration="1s">
                                <h1>Introducing <b>ZEEVANI</b> </h1>
                                <p class="bannerDescription">Now get your medicines delivered at your doorstep. <b>HASSLE FREE.</b><br>Becauese we <b>CARE</b></p>
                                <div class="button">
                                    <a href="#downloadApps" class="btn">Downlod APP</a>
                                    <a href="#video" class="btn white-btn youtube-media"><i class="fa fa-play"></i> Watch video</a>
                                </div>
                            </div>
                        </div>

                    </div> <!-- end of row -->
                </div> <!-- end of container -->

                <div class="scrolldown">
                    <a href="#works_2" class="scroll_btn"></a>
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

        


        <!-- Video Section -->

        <section id="video">
            <div class="video_overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="video_text center-content">
                                
                                <!-- 4:3 aspect ratio -->
                                <div class="embed-responsive embed-responsive-4by3">
                                  <iframe class="embed-responsive-item" style="border-radius:10px;" width="940" height="600" src="https://www.youtube.com/embed/a3LLp5RRt_U" frameborder="0" allowfullscreen></iframe>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </section>

        <!-- Our Testimonial  -->

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
        </section>

    


        <!-- Download Section  -->

        <section id="downloadApps">
            <div class="container">
                <div class="row">
                    <div class="download_heading_text center-content">
                        <h1>Download the App</h1>
                        <p>To get your medicine needs taken care by us</p>

                        <div class="down_text_des wow fadeInUp" data-wow-duration="1.5s">
                            
                            <a href=""><img src="images/d2.png" alt="" /></a>
                            
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
                                            <i class="fa fa-car"></i>
                                            <div class="right_bottom_description">
                                                <h6>Home Delivery</h6>
                                                <p>Get your medicines from the ease of your home.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="second_single_text">
                                            <i class="fa fa-magic"></i>
                                            <div class="right_bottom_description">
                                                <h6>Ease of use</h6>
                                                <p>Ipsum dolor sit amet, consectetur adipiscing elit Integer tincidunt.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="second_single_text">
                                            <i class="fa fa-file-text"></i>
                                            <div class="right_bottom_description">
                                                <h6>Directly Upload your Precription</h6>
                                                <p>Ipsum dolor sit amet, consectetur adipiscing elit Integer tincidunt.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="second_single_text">
                                            <i class="fa fa-location-arrow"></i>
                                            <div class="right_bottom_description">
                                                <h6>Location based access</h6>
                                                <p>Ipsum dolor sit amet, consectetur adipiscing elit Integer tincidunt.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-6 col-sm-6">
                            <div class="right_desc_img center-content wow fadeInRight" data-wow-duration="1.5s">
                                <img src="images/iphone4.png" alt="" />
                                
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


        <!-- message section -->

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
                                    </div> <!-- end of form-group -->

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


            </div> <!-- end of container -->
        </section>


        @include('partials.footer')



        <!-- START SCROLL TO TOP  -->

        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>



    </body>
</html>
