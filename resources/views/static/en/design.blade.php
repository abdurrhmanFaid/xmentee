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
    <link rel=”canonical” href=”https://xmentee.com/” />
    <meta name=”robots” content=”follow” />
    <meta property=”og:type” content=”XMentee” />
    <meta property=”og:title” content=”@yield('title')” />
    <meta property=”og:description” content=”@yield('description')” />
    <meta property=”og:image” content=”{{site('logo')}}” />
    <meta property=”og:url” content=”https://www.xmentee.com” />
    <meta property=”og:site_name” content=”XMentee” />
    <!-- favicon CSS -->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.png">
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
                        <li class="nav-link">
                            <a href="{{route('lang', ['locale' => 'ar', 'redirectTo' => \Illuminate\Support\Facades\URL::current()])}}">العربية</a>
                            |
                            <a href="{{route('lang', ['locale' => 'en', 'redirectTo' => \Illuminate\Support\Facades\URL::current()])}}">English</a>
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
    <section>
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
