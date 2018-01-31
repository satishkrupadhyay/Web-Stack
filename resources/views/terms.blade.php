<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Terms and Conditions</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="{{ asset('css/jquery.datatables.min.css') }}"> -->
    
    <style type="text/css">
        .blank {
            display: none;
        }
    </style>
</head>
<body>
    <div id="app">
       <nav class="navbar navbar-default navbar-static-top" style="background-color: #e3f2fd;">
            <div class="container">
                <div class="navbar-header">

                    <!--Collapsed Hamburger -->
                    <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> -->

                    <!-- Branding Image -->
                    <a href="{{ url('/home') }}" class="navbar-brand"><img src="images/Final Logo3x.png" alt="Logo" style="width:40px; height:40px; margin-top: -10px; "/></a>

                    
                </div>

               
               
            </div>
        </nav>

        <!-- @yield('content') -->
    </div>  

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Terms and Conditions </strong></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <p><b>Introduction</b></p>
                <p style="text-align:justify">These App/Website Standard Terms and Conditions (these “Terms” or these “App/Website Standard Terms and Conditions”) contained herein on this webpage, shall govern your use of this App/Website, including all pages within this App/Website (collectively referred to herein below as this “App/Website”). These Terms apply in full force and effect to your use of this App/Website and by using this App/Website; you expressly accept all terms and conditions contained herein in full. You must not use this App/Website, if you have any objection to any of these App/Website Standard Terms and Conditions.
This App/Website is not for use by any minors (defined as those who are not at least 18 years of age), and you must not use this App/Website if you are a minor.</p>
                <br>

                <p><b>Intellectual Property Rights</b></p>
                <p style="text-align:justify">Other than content you own, which you may have opted to include on this App/Website, under these Terms, Simplistic Solutions India Pvt. Ltd. and/or its licensors own all rights to the intellectual property and material contained in this App/Website, and all such rights are reserved.
You are granted a limited license only, subject to the restrictions provided in these Terms, for purposes of viewing the material contained on this App/Website, </p>
                <br>

                <p><b>Restrictions</b></p>
                You are expressly and emphatically restricted from all of the following:
                <ul style="list-style-type:disc">
                  <li>publishing any App/Website material in any media</li>
                  <li>selling, sublicensing and/or otherwise commercializing any App/Website material</li>
                  <li>publicly performing and/or showing any App/Website material</li>
                  <li>using this App/Website in any way that is, or may be, damaging to this App/Website</li>
                  <li>using this App/Website in any way that impacts user access to this App/Website</li>
                  <li>using this App/Website contrary to applicable laws and regulations, or in a way that causes, or may cause, harm to the App/Website, or to any person or business entity</li>
                  <li>engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this App/Website, or while using this App/Website</li>
                  <li>using this App/Website to engage in any advertising or marketing</li>
                </ul> 
                <p style="text-align:justify">Certain areas of this App/Website are restricted from access by you and Simplistic Solutions India Pvt. Ltd. may further restrict access by you to any areas of this App/Website, at any time, in its sole and absolute discretion.  Any user ID and password you may have for this App/Website are confidential and you must maintain confidentiality of such information.</p>
                <br>

                <p><b>Your Content</b></p>
                <p style="text-align:justify">In these App/Website Standard Terms and Conditions, “Your Content” shall mean any audio, video, text, images or other material you choose to display on this App/Website. With respect to Your Content, by displaying it, you grant Simplistic Solutions India Pvt. Ltd. a non-exclusive, worldwide, irrevocable, royalty-free, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.</p>

                <p style="text-align:justify">Your Content must be your own and must not be infringing on any third party’s rights. Simplistic Solutions India Pvt. Ltd. reserves the right to remove any of Your Content from this App/Website at any time, and for any reason, without notice.</p>
                <br>

                <p><b>No Warranties</b></p>
                <p style="text-align:justify">
                    This App/Website is provided “as is,” with all faults, and Simplistic Solutions India Pvt. Ltd. makes no express or implied representations or warranties, of any kind related to this App/Website or the materials contained on this App/Website. Additionally, nothing contained on this App/Website shall be construed as providing consult or advice to you.
                </p>
                <br>

                <p><b>Limitation of Liability</b></p>
                <p style="text-align:justify">
                    In no event shall Simplistic Solutions India Pvt. Ltd., nor any of its officers, directors and employees, be liable to you for anything arising out of or in any way connected with your use of this App/Website, whether such liability is under contract, tort or otherwise, and Simplistic Solutions India Pvt. Ltd., including its officers, directors and employees shall not be liable for any indirect, consequential or special liability arising out of or in any way related to your use of this App/Website
                </p>
                <br>

                <p><b>Severability</b></p>
                <p style="text-align:justify">
                    If any provision of these Terms is found to be unenforceable or invalid under any applicable law, such unenforceability or invalidity shall not render these Terms unenforceable or invalid as a whole, and such provisions shall be deleted without affecting the remaining provisions herein.
                </p>
                <br>

                <p><b>Variation of Terms</b></p>
                <p style="text-align:justify">
                    Simplistic Solutions India Pvt. Ltd. is permitted to revise these Terms at any time as it sees fit, and by using this App/Website you are expected to review such Terms on a regular basis to ensure you understand all terms and conditions governing use of this App/Website.
                </p>
                <br>

                <p><b>Entire Agreement</b></p>
                <p style="text-align:justify">
                    These Terms, including any legal notices and disclaimers contained on this App/Website, constitute the entire agreement between Simplistic Solutions India Pvt. Ltd. and you in relation to your use of this App/Website, and supersede all prior agreements and understandings with respect to the same.
                </p>
                <br>

                <p><b>Governing Law &amp; Jurisdiction</b></p>
                <p style="text-align:justify">
                    These Terms will be governed by and construed in accordance with the laws of the State of Assam, and you submit to the non-exclusive jurisdiction of the state and federal courts located in Assam for the resolution of any disputes.
                </p>
                <br>
                </div>
            </div>
        </div>
    </div>
</div>

 @include('partials.footer')


</body>


</html>
