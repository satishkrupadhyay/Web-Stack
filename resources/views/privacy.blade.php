<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Privacy Policy</title>

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
                <div class="panel-heading"><strong> Privacy Policies </strong></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <p><b>Audience</b></p>
                <p style="text-align:justify">This policy applies to all visitors to our website and customers who have subscribed to the services we offer.</p>
                <br>

                <p><b>Purpose of this policy</b></p>
                <p style="text-align:justify">We respect your privacy and take the protection of personal information very seriously. The purpose of this policy is to describe the way we collect, store, use and protect information that can be associated with a specific natural or juristic person and can be used to identify that person (“personal information”).Personal information includes:</p>

                <ul style="list-style-type:disc">
                    <li>Certain information collected on registration (see below);</li>
                    <li>Optional information that you voluntarily provide to us.</li>
                </ul>

                <p><b>Excludes:</b></p>
                 <p style="text-align:justify"
                        <ul style="list-style-type:disc">
                          <li>Information that has been made anonymous so that it does not identify a specific person; </li>
                          <li>Permanently de-identified information that does not relate or cannot be traced back to you specifically;</li>
                          <li>Non-personal statistical information collected and compiled by us and information that you have provided voluntarily in an open, public environment or forum including (without limitation) any blog, chat room, community, classifieds or discussion board. Because the information has been disclosed in a public forum, it is no longer confidential and does not constitute personal information subject to protection under this policy.</li>     
                        </ul>
                </p> 
                <br>

                <p><b> Acceptance of terms </b></p>
                <p style="text-align:justify">You must accept all the terms of this policy when you register for any of our services. If you do not agree with anything in this policy, then you may not register for and use any of the services. You may not access our website or use our services if you are younger than 18 years old or do not have legal capacity to conclude legally binding contracts. By accepting this policy, you are deemed to have read, understood, accepted, and agreed to be bound by all its terms.</p>
                <br>

                <p><b> Changes </b></p>
                <p style="text-align:justify">
                    We may change the terms of this policy at any time. We will notify you of any changes by placing a notice in a prominent place on the website or by email.  If you do not agree with the change you must stop using the services.  If you continue to use the services following notification of a change to the terms, the changed terms will apply to you and you will be deemed to have accepted such terms. 
                </p>
                <br>

                <p><b> Collection </b></p>
                <p style="text-align:justify">
                    <ul style="list-style-type:disc">
                    <li>On registration. Once you register on our website, you will no longer be anonymous to us as you will provide us with personal information. This personal information will include: Name, surname, postal address, email address, telephone number, postal code, unique user ID.</li>

                    <li>Optional details. You may also provide additional information on a voluntary basis (“optional information”). This includes content or product that you decide to upload or download from our website or when you enter competitions, take advantage of promotions, respond to surveys, register and subscribe for certain additional services, or otherwise use the optional features and functionality of the website.</li>

                    <li>Collection from browser. We automatically receive and record Internet usage information on our hosting company’s server logs from your browser, such as your internet protocol address (“IP Address”), browsing habits, click patterns, version of software installed, system type, screen resolutions, colour capabilities, plug-ins, language settings, cookie preferences, search engine keywords, JavaScript enablement, the content and pages that you access on the website, and the dates and times that you visit the website, paths taken, and time spent on sites and pages within the website (“usage information”). Please note that other websites visited before entering our website might place personal information within your URL during a visit to it, and we have no control over such websites. Accordingly, a subsequent website that collects URL information may log some personal information. </li>

                    <li>Cookies: When you access our website we may send one or more cookies (small text files containing a string of alphanumeric characters) to your computer to collect certain usage information. We use session cookies (which disappear after you close your browser) and persistent cookies (which remain after you close your browser which can be removed manually) and may be used by your browser on subsequent visits to our website. We use information gathered by cookies to improve the website. </li>
                    
                    <li>Web beacons: Our website may contain electronic image requests (called a “single-pixel gif” or “web beacon” request) that allow us to count page views and to access cookies. Any electronic image viewed as part of a web page (including an ad banner) can act as a web beacon. Our web beacons do not collect, gather, monitor or share any of your personal information. We merely use them to compile anonymous information about our website. </li>

                    <li>Purpose for collection: We may use any service information and optional information provided by you for such purposes as indicated to you at the time you agree to provide such optional information. We may use your usage information for the purposes described  above and to:
                        <ul>
                            <li>remember your information so that you will not have to re-enter it during your visit or the next time you access the website; </li>
                            <li>monitor website usage metrics such as total number of visitors and pages accessed; and</li>
                            <li>track your entries, submissions, and status in any promotions or other activities in connection with your usage of the website.</li>
                        </ul>
                    </ul>
                </p>
                <br>

                <p><b> Consent to collection </b></p>
                <p style="text-align:justify">
                    We will obtain your consent to collect personal information:
                    <ul style="list-style-type:disc">
                        <li>In accordance with applicable law; and</li>
                        <li>At the time you provide us with any registration information and optional information.</li>
                    </ul> 
                </p>
                <br>

                <p><b>Use: Messages and updates</b></p>
                <p style="text-align:justify">
                    We may send administrative messages and email updates to you regarding the website. In some cases, we may also send you primarily promotional messages. You can choose to opt-out of promotional messages.
                </p>
                <br>

                <p><b> Disclosure: Sharing </b></p>
                <p style="text-align:justify">
                    <ul style="list-style-type:disc">
                        <li>We may share your personal information with an affiliate, in which case we will seek to require the affiliates to honor this privacy policy.
                        </li>

                        <li>Our service providers under contract who help with parts of our business operations (fraud prevention, bill collection, marketing, technology services). Our contracts dictate that these service providers only use your information in connection with the services they perform for us and not for their own benefit;</li>

                        <li>Credit bureaus to report account information, as permitted by law;
                            <ul>
                                <li>Banking partners as required by credit card association rules for inclusion on their list of terminated merchants (in the event that you utilize the Services to receive payments and you meet their criteria); </li>
                            </ul>
                        </li>

                        <li> Regulators 
                            <ul>
                                <li>If you contact us regarding your experience with using any of our products, we may disclose your personal information as required of by law or governmental audit.
                                </li>
                            </ul>
                        </li>

                        <li> Law enforcement 
                            <ul>
                                <li>We may disclose personal information if required by a subpoena or court order; to comply with any law; to protect the safety of any individual or the general public; to prevent violation of our terms of service.</li>
                            </ul>
                        </li>

                        <li> No selling 
                            <ul>
                                <li>We will not sell personal information.  No personal information will be disclosed to anyone except as provided in this privacy policy.</li>
                            </ul>
                        </li>
                        <li> Marketing purposes  
                            <ul>
                                <li>We may disclose aggregate statistics (information about the customer population in general terms) about the personal information to advertisers or business partners.</li>
                            </ul>
                         </li>
                        <li> Change of ownership  
                            <ul>
                                <li>If we undergo a change in ownership, or a merger with, acquisition by, or sale of assets to, another entity, we may assign our rights to the personal information we process to a successor, purchaser, or separate entity. We will disclose the transfer on the website.  If you are concerned about your personal information migrating to a new owner, you may request us to delete your personal information.</li>
                            </ul>
                        </li>
                        <li> Employees 
                            <ul>
                                <li>We may need to disclose personal information to our employees that require the personal information to do their jobs. </li>
                            </ul>
                        </li>
                    </ul>
                </p>
                <br>

                <p><b> Security of personal information </b></p>
                <p style="text-align:justify">
                    We protect your personal information using computer safeguards such as firewalls and data encryption to protect personal information, and we authorize access to personal information only for those employees who require it to fulfill their job responsibilities.
                </p>
                <br>

                 <p><b> Accurate and up to date </b></p>
                 <p style="text-align:justify">
                    We will try to keep the personal information we collect as accurate, complete and up to date as is necessary for. From time to time we will request you to update your personal information on the website.  You are able to review or update any personal information that we hold on you by accessing your account online or by emailing us or phoning us.  Please note that in order to better protect you and safeguard your personal information, we do take steps to verify your identity before granting you access to your account or making any corrections to your personal information.
                </p>
                <br>

                 <p><b> Limitation  </b></p>
                 <p style="text-align:justify">We are not responsible for, give no warranties, nor make any representations in respect of the privacy policies or practices of any third party websites. </p>
                 <br>

                 <p><b> Enquiries  </b></p>
                 <p style="text-align:justify">If you have any questions or concerns arising from this privacy policy or the way in which we handle personal information, please contact us.</p>
                 <br>

                </div>
            </div>
        </div>
    </div>
</div>


 @include('partials.footer')

</body>


</html>
