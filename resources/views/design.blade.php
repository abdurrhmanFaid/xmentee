<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{site('name')}} | @yield('title')</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta content="{{site('description')}}" name="description">
    <meta content="{{site('keywords')}}" name="keywords">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- App favicon -->
    <link rel="icon" href="{{site('icon')}}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{site('icon')}}">
    <link rel="canonical" href="https://xmentee.com/" />
    <meta name="robots" content="follow" />
    <meta property="og:type" content="XMentee" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:image" content="{{site('logo')}}" />
    <meta property="og:url" content="https://www.xmentee.com" />
    <meta property="og:site_name" content="XMentee" />
    <!-- favicon CSS -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{site('icon')}}">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <!-- Icon fonts -->
    <link href="{{theme('css', 'icons.css')}}" rel="stylesheet" type="text/css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="/theme0/css/plugins.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="/theme0/css/style.css">

</head>

<body class="theme-royal-blue" data-spy="scroll" data-target="#navbar-nav" data-animation="false" data-appearance="light">


<main class="main hidden">
    <!-- =========== Start of Navigation (main menu) ============ -->
    <header class="navbar navbar-sticky navbar-expand-lg navbar-light">
        <div class="container-fluid position-relative">
            <a class="navbar-brand" href="{{route('home')}}">
                <img class="navbar-brand__regular mb-1" src="{{site('logo')}}" height="70" alt="{{site('name')}}">
                <img class="navbar-brand__sticky" src="{{site('logo')}}" height="70" alt="{{site('name')}}">
                <h3 class="d-inline"><b>XM</b>entee</h3>
            </a>
            <!--  End of brand logo -->
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- end of Nav toggler -->

            <div class="navbar-inner pl-lg-2 pl-xl-6">
                <!--  Nav close button inside off-canvas/ mobile menu -->
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- end of Nav Toggoler -->
                <nav>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li>
                            <a class="nav-link" href="{{route('bands.request')}}">Add your team</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{route('tickets.request')}}">Request a ticket</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{route('login')}}">Sign In</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{route('register')}}">Join your team</a>
                        </li>

                    </ul>
                    <!-- end of nav menu items -->
                </nav>
            </div>
            <div class="mr-5 mr-lg-0 ml-lg-2">
            </div>
        </div>
        <!-- end of container -->
    </header>
    <!-- =========== End of Navigation (main menu)  ============ -->

        @yield('content')

<!-- =========== Start of Newsletter & Footer ============ -->
    <section class="space--top">
        <div class=" position-relative pb-7 pb-md-4 pb-lg-1 pb-xl-0 z-index1">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-9 col-lg-6 mb-4 mb-lg-7 mx-auto text-center reveal">
                        <h2 class="mb-2 font-size--40 font-w--700">Sign up for the latest updates.</h2>
                    </div>
                </div>
                <!-- end of section title row -->

                <div class="row mb-8 ">
                    <div class="col-12 col-md-10 col-lg-6 mx-md-auto">
                        <div class="form--v4 reveal">
                            <!-- Begin Mailchimp Signup Form -->
                            <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                            <style type="text/css">
                                #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
                                /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
                                   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                            </style>
                            <div id="mc_embed_signup">
                                <form action="https://xmentee.us4.list-manage.com/subscribe/post?u=d1b358d53c08fbb2a8ff4a2c2&amp;id=7436c7ee25" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll">
                                        <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                                        <div class="mc-field-group form-group ">
                                            <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
                                            </label>
                                            <input type="email" value="" name="EMAIL" class="form-control" id="mce-EMAIL">
                                        </div>
                                        <div class="mc-field-group form-group ">
                                            <label for="mce-FNAME">First Name </label>
                                            <input type="text" value="" name="FNAME" class="form-control" id="mce-FNAME">
                                        </div>
                                        <div class="mc-field-group form-group ">
                                            <label for="mce-LNAME">Last Name </label>
                                            <input type="text" value="" name="LNAME" class="form-control" id="mce-LNAME">
                                        </div>
                                        <div class="mc-field-group  form-group size1of2">
                                            <label for="mce-BIRTHDAY-month">Birthday </label>
                                            <div class="datefield">
                                                <span class="subfield monthfield"><input class="birthday form-control" type="text" pattern="[0-9]*" value="" placeholder="MM" size="2" maxlength="2" name="BIRTHDAY[month]" id="mce-BIRTHDAY-month"></span> /
                                                <span class="subfield dayfield"><input class="birthday form-control" type="text" pattern="[0-9]*" value="" placeholder="DD" size="2" maxlength="2" name="BIRTHDAY[day]" id="mce-BIRTHDAY-day"></span>
                                                <span class="small-meta nowrap">( mm / dd )</span>
                                            </div>
                                        </div>	<div id="mce-responses" class="clear">
                                            <div class="response" id="mce-error-response" style="display:none"></div>
                                            <div class="response" id="mce-success-response" style="display:none"></div>
                                        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_d1b358d53c08fbb2a8ff4a2c2_7436c7ee25" tabindex="-1" value=""></div>
                                        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                    </div>
                                </form>
                            </div>
                            <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                            <!--End mc_embed_signup-->
                        </div>
                    </div>
                </div>
                <!-- end of row -->
                <div class="row">
                    <div class="col-12 col-md-10 col-lg-9 col-xl-8 text-center mx-auto mb-3 mb-sm-1">
                        <picture>
                            <img src="/theme0/img/newsletter-illustrator-2.png" alt="illustration" class="img-fluid">
                        </picture>
                    </div>
                </div>
                <!-- end of image row -->
            </div>
            <!-- end of newsletter container -->
        </div>
        <!-- end of newsletter area -->

        <footer class="footer pt-10 bg-color--primary section--dark position-relative hidden jsElement" data-pull="-153">
            <div class="pt-3 pt-lg-10 pb-6 pb-lg-10 border--bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-9 col-lg-6 mb-4 mb-xl-0">
                            <div class="pr-xl-3">
                                <a class="navbar-brand" href="{{route('home')}}">
                                    <img class="navbar-brand__regular mb-1" src="{{site('logo')}}" height="70" alt="{{site('name')}}">
                                    <img class="navbar-brand__sticky" src="{{site('logo')}}" height="70" alt="{{site('name')}}">
                                    <h3 class="d-inline"><b>XM</b>entee</h3>
                                </a>
                                <p>
                                    {{site('description')}}
                                </p>
                            </div>
                        </div>
                        <!-- end of col -->
                        <div class="col-6 col-md-6 col-lg-6 col-xl-2 mb-2 mb-xl-0">
                            <div class="widget widget-nav">
                                <span class="widget__title font-size--20 font-w--700 mb-1">Useful Link</span>
                                <ul>
                                    <li><a href="{{route('bands.request')}}">Group Request</a></li>
                                    <li><a href="{{route('login')}}">Login to your group</a></li>
                                    <li><a href="{{route('tickets.request')}}">Request a ticket</a></li>
                                    <li><a href="{{route('register')}}">Register an account</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end of widget col-->
                        <div class="col-6 col-md-6 col-lg-6 col-xl-2 offset-xl-1 mb-2 mb-xl-0">
                            <div class="widget widget-nav">
                                <span class="widget__title font-size--20 font-w--700 mb-1">Documents</span>
                                <ul>
                                    <li><a href="{{route('faq')}}">FAQ</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#termsModal">Terms of use</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of main footer container-->
            </div>
            <!-- end of main footer -->
            <div class="py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <p class="font-size--15 opacity--80">© 2020 <a href="{{route('home')}}" class="color--white"><b>XMentee</b></a>. All Rights Reserved.</p>
                        </div>
                    </div>
                    <!-- end of mini footer row -->
                </div>
                <!-- end of mini footer container -->
            </div>
            <!-- end of mini footer -->
        </footer>
        <!-- End of Footer area -->

        <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="termsModalLabel">Terms of use</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Welcome to XMentee</h5>
                        <p class="font-size--13" class="font-size--13">These terms and conditions outline the rules and regulations for the use of XMentee's Website.</p> <br />
                        <p class="font-size--13">By accessing this website we assume you accept these terms and conditions in full. Do not continue to use XMentee's website
                            if you do not accept all of the terms and conditions stated on this page.</p>
                        <p class="font-size--13">The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice
                            and any or all Agreements: "Client", "You" and "Your" refers to you, the person accessing this website
                            and accepting the Company's terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers
                            to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves, or either the Client
                            or ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake
                            the process of our assistance to the Client in the most appropriate manner, whether by formal meetings
                            of a fixed duration, or any other means, for the express purpose of meeting the Client's needs in respect
                            of provision of the Company's stated services/products, in accordance with and subject to, prevailing law
                            of . Any use of the above terminology or other words in the singular, plural,
                            capitalisation and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p><h5>Cookies</h5>
                        <p class="font-size--13">We employ the use of cookies. By using XMentee's website you consent to the use of cookies
                            in accordance with XMentee's privacy policy.</p><p class="font-size--13">Most of the modern day interactive web sites
                            use cookies to enable us to retrieve user details for each visit. Cookies are used in some areas of our site
                            to enable the functionality of this area and ease of use for those people visiting. Some of our
                            affiliate / advertising partners may also use cookies.</p><h5>License</h5>
                        <p class="font-size--13">Unless otherwise stated, XMentee and/or it's licensors own the intellectual property rights for
                            all material on XMentee. All intellectual property rights are reserved. You may view and/or print
                            pages from https://www.xmentee.com for your own personal use subject to restrictions set in these terms and conditions.</p>
                        <p class="font-size--13">You must not:</p>
                        <ol>
                            <li>Republish material from https://www.xmentee.com</li>
                            <li>Sell, rent or sub-license material from https://www.xmentee.com</li>
                            <li>Reproduce, duplicate or copy material from https://www.xmentee.com</li>
                        </ol>
                        <p class="font-size--13">Redistribute content from XMentee (unless content is specifically made for redistribution).</p>
                        <p class="font-size--13">Approved organizations may hyperlink to our Web site as follows:</p>

                        <ol>
                            <li>By use of our corporate name; or</li>
                            <li>By use of the uniform resource locator (Web address) being linked to; or</li>
                            <li>By use of any other description of our Web site or material being linked to that makes sense within the
                                context and format of content on the linking party's site.</li>
                        </ol>
                        <p class="font-size--13">No use of XMentee's logo or other artwork will be allowed for linking absent a trademark license
                            agreement.</p>
                        <h5>Iframes</h5>
                        <p class="font-size--13">Without prior approval and express written permission, you may not create frames around our Web pages or
                            use other techniques that alter in any way the visual presentation or appearance of our Web site.</p>
                        <h5>Reservation of Rights</h5>
                        <p class="font-size--13">We reserve the right at any time and in its sole discretion to request that you remove all links or any particular
                            link to our Web site. You agree to immediately remove all links to our Web site upon such request. We also
                            reserve the right to amend these terms and conditions and its linking policy at any time. By continuing
                            to link to our Web site, you agree to be bound to and abide by these linking terms and conditions.</p>
                        <h5>Removal of links from our website</h5>
                        <p class="font-size--13">If you find any link on our Web site or any linked web site objectionable for any reason, you may contact
                            us about this. We will consider requests to remove links but will have no obligation to do so or to respond
                            directly to you.</p>
                        <p class="font-size--13">Whilst we endeavour to ensure that the information on this website is correct, we do not warrant its completeness
                            or accuracy; nor do we commit to ensuring that the website remains available or that the material on the
                            website is kept up to date.</p>
                        <h5>Content Liability</h5>
                        <p class="font-size--13">We shall have no responsibility or liability for any content appearing on your Web site. You agree to indemnify
                            and defend us against all claims arising out of or based upon your Website. No link(s) may appear on any
                            page on your Web site or within any context containing content or materials that may be interpreted as
                            libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or
                            other violation of, any third party rights.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =========== End of of Newsletter & Footer ============ -->
</main>
<script src="/theme0/js/plugins.min.js"></script>
</body>

</html>
