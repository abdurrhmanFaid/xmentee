<!doctype html>
<html lang="{{currentLocale()}}">
    @include('layouts.partials._head')
    <body class="account-body accountbg">
        <div class="container">
            <div class="row">
                <div class="col-12 align-self-center">
                    <div id="app" class="auth-page" style="margin-top: 100px">
                        <div class="text-center mb-50">
                            <h1><b>XM</b>entee</h1>
                            <p class="text-muted">{{site('motto')}}</p>
                        </div>
                        <div class="card auth-card shadow-lg">
                            <div class="card-body">
                                <div class="px-3">
                                    <div class="auth-logo-box">
                                        <a
                                            href="{{route('home')}}"
                                            class="logo logo-admin">
                                            <img
                                                src="{{site('logo')}}"
                                                height="55"
                                                alt="{{site('name')}}"
                                                title="{{site('name')}}"
                                                class="auth-logo">
                                        </a>
                                    </div>
                                    <!--end auth-logo-box-->
                                    <div class="text-center auth-logo-text">
                                        <h4 class="mt-0 mt-5">{{$title}}</h4>
                                    </div>
                                    <!--end auth-logo-text-->
                                    {{$form}}
                                </div>
                                <!--end /div-->
                            </div>
                            <!--end card-body-->
                            <div class="card-footer text-center">
                                @include('layouts.partials.__guest_action_buttons')
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                    <!--end auth-page-->
                </div>
                <!--end col-->
            </div>
            <div>
                <h6 class="my-4"></h6>
                <footer class="text-center position-relative" style="padding: 20px;">
                    <span class="d-block">
                        Copyright &copy; {{date('Y')}} {{site('name')}}
                    </span>
                    <span class="text-muted d-sm-inline-block">
                        Built with <i class="fa fa-heartbeat text-danger"></i> by A||F
                    </span>
                </footer>
            </div>
        </div>
        @include('layouts.partials._scripts')
    </body>

</html>
