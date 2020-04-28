@extends('layouts.app')

@section('pageTitle')
    {{__('home.dashboard')}}
@endsection

@section('content')
    <div class="container">
        <h6 class="page-title">{!! __('home.welcome', ['name' => auth()->user()->name]) !!}</h6>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <!--end card-->
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <div class="icon-info"><i class="fa fa-list text-purple"></i></div>
                                    </div>
                                    <div class="col-8 align-self-center text-right">
                                        <div class="ml-2">
                                            <a href="{{route('categories.index')}}">
                                                <p class="mb-1 text-muted">
                                                    {{__('home.categories_count')}}
                                                </p>
                                            </a>
                                            <h3 class="mt-0 mb-1">{{$categoriesCount}}</h3></div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <div class="icon-info"><i class="fa fa-video text-success"></i></div>
                                    </div>
                                    <div class="col-8 align-self-center text-right text-success">
                                        <div class="ml-2">
                                            <a href="{{route('lessons.index')}}">
                                                <p class="mb-1 text-muted">
                                                        {{__('home.lessons_count')}}
                                                </p>
                                            </a>
                                            <h3 class="mt-0 mb-1">{{$lessonsCount}}</h3></div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <div class="icon-info"><i class="fa fa-users text-danger"></i></div>
                                    </div>
                                    <div class="col-8 align-self-center text-right text-danger">
                                        <div class="ml-2">
                                            <a href="{{route('users.index')}}">
                                                <p class="mb-1 text-muted">
                                                    {{__('home.members_count')}}
                                                </p>
                                            </a>
                                            <h3 class="mt-0 mb-1">{{$membersCount}}</h3></div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 align-self-center">
                                        <div class="icon-info"><i class="fa fa-question-circle text-hover--dark"></i></div>
                                    </div>
                                    <div class="col-8 align-self-center text-right text-hover--dark">
                                        <div class="ml-2">
                                            <a href="{{route('posts.index')}}">
                                                <p class="mb-0 text-muted">{{__('home.posts_count')}}</p>
                                            </a>
                                            <h3 class="mt-0 mb-1 d-inline-block">
                                                {{auth()->user()->band->posts()->count()}}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Project Budget</h4>
                        <div id="morris-bar-chart" class="morris-chart project-budget-chart drop-shadow-bar" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                            <svg height="273" version="1.1" width="850.656" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.5px;">
                                <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc>
                                <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                                <text x="54.5" y="231" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#8997bd" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                    <tspan dy="4.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">$0</tspan>
                                </text>
                                <path fill="none" stroke="#d2d6e6" d="M67,231H825.656" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="54.5" y="179.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#8997bd" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                    <tspan dy="4.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">$2,500</tspan>
                                </text>
                                <path fill="none" stroke="#d2d6e6" d="M67,179.5H825.656" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="54.5" y="128" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#8997bd" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                    <tspan dy="4.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">$5,000</tspan>
                                </text>
                                <path fill="none" stroke="#d2d6e6" d="M67,128H825.656" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="54.5" y="76.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#8997bd" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                    <tspan dy="4.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">$7,500</tspan>
                                </text>
                                <path fill="none" stroke="#d2d6e6" d="M67,76.5H825.656" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="54.5" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#8997bd" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                    <tspan dy="4.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">$10,000</tspan>
                                </text>
                                <path fill="none" stroke="#d2d6e6" d="M67,25H825.656" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <text x="762.4346666666667" y="243.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#8997bd" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,8.5)">
                                    <tspan dy="4.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Banking</tspan>
                                </text>
                                <text x="635.992" y="243.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#8997bd" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,8.5)">
                                    <tspan dy="4.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Trading System</tspan>
                                </text>
                                <text x="383.1066666666666" y="243.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#8997bd" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,8.5)">
                                    <tspan dy="4.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Organic Farming</tspan>
                                </text>
                                <text x="130.22133333333332" y="243.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#8997bd" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,8.5)">
                                    <tspan dy="4.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Marketech World</tspan>
                                </text>
                                <path fill="#2c77f4" stroke="none" d="M111.25493333333333,30Q111.25493333333333,25,116.25493333333333,25L113.56586666666666,25Q118.56586666666666,25,118.56586666666666,30L118.56586666666666,226Q118.56586666666666,231,113.56586666666666,231L116.25493333333333,231Q111.25493333333333,231,111.25493333333333,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="#1ecab8" stroke="none" d="M126.56586666666666,71.19999999999999Q126.56586666666666,66.19999999999999,131.56586666666666,66.19999999999999L128.8768,66.19999999999999Q133.8768,66.19999999999999,133.8768,71.19999999999999L133.8768,226Q133.8768,231,128.8768,231L131.56586666666666,231Q126.56586666666666,231,126.56586666666666,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="#f3cd6d" stroke="none" d="M141.8768,75.32Q141.8768,70.32,146.8768,70.32L144.18773333333334,70.32Q149.18773333333334,70.32,149.18773333333334,75.32L149.18773333333334,226Q149.18773333333334,231,144.18773333333334,231L146.8768,231Q141.8768,231,141.8768,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="#2c77f4" stroke="none" d="M237.69759999999997,60.900000000000006Q237.69759999999997,55.900000000000006,242.69759999999997,55.900000000000006L240.0085333333333,55.900000000000006Q245.0085333333333,55.900000000000006,245.0085333333333,60.900000000000006L245.0085333333333,226Q245.0085333333333,231,240.0085333333333,231L242.69759999999997,231Q237.69759999999997,231,237.69759999999997,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="#1ecab8" stroke="none" d="M253.0085333333333,91.80000000000001Q253.0085333333333,86.80000000000001,258.0085333333333,86.80000000000001L255.31946666666664,86.80000000000001Q260.31946666666664,86.80000000000001,260.31946666666664,91.80000000000001L260.31946666666664,226Q260.31946666666664,231,255.31946666666664,231L258.0085333333333,231Q253.0085333333333,231,253.0085333333333,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="#f3cd6d" stroke="none" d="M268.31946666666664,102.1Q268.31946666666664,97.1,273.31946666666664,97.1L270.63039999999995,97.1Q275.63039999999995,97.1,275.63039999999995,102.1L275.63039999999995,226Q275.63039999999995,231,270.63039999999995,231L273.31946666666664,231Q268.31946666666664,231,268.31946666666664,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="#2c77f4" stroke="none" d="M364.1402666666666,50.599999999999994Q364.1402666666666,45.599999999999994,369.1402666666666,45.599999999999994L366.4511999999999,45.599999999999994Q371.4511999999999,45.599999999999994,371.4511999999999,50.599999999999994L371.4511999999999,226Q371.4511999999999,231,366.4511999999999,231L369.1402666666666,231Q364.1402666666666,231,364.1402666666666,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="#1ecab8" stroke="none" d="M379.4511999999999,81.5Q379.4511999999999,76.5,384.4511999999999,76.5L381.7621333333332,76.5Q386.7621333333332,76.5,386.7621333333332,81.5L386.7621333333332,226Q386.7621333333332,231,381.7621333333332,231L384.4511999999999,231Q379.4511999999999,231,379.4511999999999,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="#f3cd6d" stroke="none" d="M394.7621333333333,91.80000000000001Q394.7621333333333,86.80000000000001,399.7621333333333,86.80000000000001L397.0730666666666,86.80000000000001Q402.0730666666666,86.80000000000001,402.0730666666666,91.80000000000001L402.0730666666666,226Q402.0730666666666,231,397.0730666666666,231L399.7621333333333,231Q394.7621333333333,231,394.7621333333333,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="#2c77f4" stroke="none" d="M490.5829333333333,40.30000000000001Q490.5829333333333,35.30000000000001,495.5829333333333,35.30000000000001L492.8938666666666,35.30000000000001Q497.8938666666666,35.30000000000001,497.8938666666666,40.30000000000001L497.8938666666666,226Q497.8938666666666,231,492.8938666666666,231L495.5829333333333,231Q490.5829333333333,231,490.5829333333333,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="#1ecab8" stroke="none" d="M505.8938666666666,60.900000000000006Q505.8938666666666,55.900000000000006,510.8938666666666,55.900000000000006L508.2048,55.900000000000006Q513.2048,55.900000000000006,513.2048,60.900000000000006L513.2048,226Q513.2048,231,508.2048,231L510.8938666666666,231Q505.8938666666666,231,505.8938666666666,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="#f3cd6d" stroke="none" d="M521.2048,81.5Q521.2048,76.5,526.2048,76.5L523.5157333333333,76.5Q528.5157333333333,76.5,528.5157333333333,81.5L528.5157333333333,226Q528.5157333333333,231,523.5157333333333,231L526.2048,231Q521.2048,231,521.2048,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="#2c77f4" stroke="none" d="M617.0255999999999,81.5Q617.0255999999999,76.5,622.0255999999999,76.5L619.3365333333333,76.5Q624.3365333333333,76.5,624.3365333333333,81.5L624.3365333333333,226Q624.3365333333333,231,619.3365333333333,231L622.0255999999999,231Q617.0255999999999,231,617.0255999999999,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="#1ecab8" stroke="none" d="M632.3365333333333,122.7Q632.3365333333333,117.7,637.3365333333333,117.7L634.6474666666666,117.7Q639.6474666666666,117.7,639.6474666666666,122.7L639.6474666666666,226Q639.6474666666666,231,634.6474666666666,231L637.3365333333333,231Q632.3365333333333,231,632.3365333333333,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="#f3cd6d" stroke="none" d="M647.6474666666666,133Q647.6474666666666,128,652.6474666666666,128L649.9583999999999,128Q654.9583999999999,128,654.9583999999999,133L654.9583999999999,226Q654.9583999999999,231,649.9583999999999,231L652.6474666666666,231Q647.6474666666666,231,647.6474666666666,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="#2c77f4" stroke="none" d="M743.4682666666665,81.5Q743.4682666666665,76.5,748.4682666666665,76.5L745.7791999999998,76.5Q750.7791999999998,76.5,750.7791999999998,81.5L750.7791999999998,226Q750.7791999999998,231,745.7791999999998,231L748.4682666666665,231Q743.4682666666665,231,743.4682666666665,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="#1ecab8" stroke="none" d="M758.7791999999998,122.7Q758.7791999999998,117.7,763.7791999999998,117.7L761.0901333333331,117.7Q766.0901333333331,117.7,766.0901333333331,122.7L766.0901333333331,226Q766.0901333333331,231,761.0901333333331,231L763.7791999999998,231Q758.7791999999998,231,758.7791999999998,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                                <path fill="#f3cd6d" stroke="none" d="M774.0901333333331,133Q774.0901333333331,128,779.0901333333331,128L776.4010666666665,128Q781.4010666666665,128,781.4010666666665,133L781.4010666666665,226Q781.4010666666665,231,776.4010666666665,231L779.0901333333331,231Q774.0901333333331,231,774.0901333333331,226Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                            </svg>
                            <div class="morris-hover morris-default-style" style="left: 57.0338px; top: 69px;">
                                <div class="morris-hover-row-label">Marketech World</div>
                                <div class="morris-hover-point" style="color: #2c77f4">
                                    Total: $10,000
                                </div>
                                <div class="morris-hover-point" style="color: #1ecab8">
                                    Used: $8,000
                                </div>
                                <div class="morris-hover-point" style="color: #f3cd6d">
                                    Target: $7,800
                                </div>
                            </div>
                        </div>
                        <ul class="list-unstyled text-center text-muted mb-0 mt-2">
                            <li class="list-inline-item"><i class="mdi mdi-album text-primary mr-2"></i>Total Budget</li>
                            <li class="list-inline-item"><i class="mdi mdi-album mr-2 text-primary-light"></i>Amount Used</li>
                            <li class="list-inline-item"><i class="mdi mdi-album mr-2 text-primary-light-alt"></i>Target Amount</li>
                        </ul>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Tasks Performance</h4>
                        <div class="" style="position: relative;">
                            <div id="d2_performance" class="apex-charts" style="min-height: 300px;">
                                <div id="apexchartsbl8tlcp1" class="apexcharts-canvas apexchartsbl8tlcp1 light" style="width: 393px; height: 300px;">
                                    <svg id="SvgjsSvg1059" width="393" height="300" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                        <foreignObject x="0" y="0" width="393" height="300">
                                            <div class="apexcharts-legend center position-left" xmlns="http://www.w3.org/1999/xhtml" style="position: absolute; left: 80px; top: 20px;">
                                                <div class="apexcharts-legend-series" rel="1" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="1" data:collapsed="false" style="background: rgb(30, 202, 184); color: rgb(30, 202, 184); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="1" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-family: Helvetica, Arial, sans-serif;">Completed</span></div>
                                                <div class="apexcharts-legend-series" rel="2" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="2" data:collapsed="false" style="background: rgb(253, 60, 151); color: rgb(253, 60, 151); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="2" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-family: Helvetica, Arial, sans-serif;">Active</span></div>
                                                <div class="apexcharts-legend-series" rel="3" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="3" data:collapsed="false" style="background: rgb(109, 129, 245); color: rgb(109, 129, 245); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="3" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-family: Helvetica, Arial, sans-serif;">Assigned</span></div>
                                            </div>
                                            <style type="text/css">
                                                .apexcharts-legend {
                                                    display: flex;
                                                    overflow: auto;
                                                    padding: 0 10px;
                                                }

                                                .apexcharts-legend.position-bottom,
                                                .apexcharts-legend.position-top {
                                                    flex-wrap: wrap
                                                }

                                                .apexcharts-legend.position-right,
                                                .apexcharts-legend.position-left {
                                                    flex-direction: column;
                                                    bottom: 0;
                                                }

                                                .apexcharts-legend.position-bottom.left,
                                                .apexcharts-legend.position-top.left,
                                                .apexcharts-legend.position-right,
                                                .apexcharts-legend.position-left {
                                                    justify-content: flex-start;
                                                }

                                                .apexcharts-legend.position-bottom.center,
                                                .apexcharts-legend.position-top.center {
                                                    justify-content: center;
                                                }

                                                .apexcharts-legend.position-bottom.right,
                                                .apexcharts-legend.position-top.right {
                                                    justify-content: flex-end;
                                                }

                                                .apexcharts-legend-series {
                                                    cursor: pointer;
                                                    line-height: normal;
                                                }

                                                .apexcharts-legend.position-bottom .apexcharts-legend-series,
                                                .apexcharts-legend.position-top .apexcharts-legend-series {
                                                    display: flex;
                                                    align-items: center;
                                                }

                                                .apexcharts-legend-text {
                                                    position: relative;
                                                    font-size: 14px;
                                                }

                                                .apexcharts-legend-text *,
                                                .apexcharts-legend-marker * {
                                                    pointer-events: none;
                                                }

                                                .apexcharts-legend-marker {
                                                    position: relative;
                                                    display: inline-block;
                                                    cursor: pointer;
                                                    margin-right: 3px;
                                                }

                                                .apexcharts-legend.right .apexcharts-legend-series,
                                                .apexcharts-legend.left .apexcharts-legend-series {
                                                    display: inline-block;
                                                }

                                                .apexcharts-legend-series.no-click {
                                                    cursor: auto;
                                                }

                                                .apexcharts-legend .apexcharts-hidden-zero-series,
                                                .apexcharts-legend .apexcharts-hidden-null-series {
                                                    display: none !important;
                                                }

                                                .inactive-legend {
                                                    opacity: 0.45;
                                                }
                                            </style>
                                        </foreignObject>
                                        <g id="SvgjsG1061" class="apexcharts-inner apexcharts-graphical" transform="translate(12, 0)">
                                            <defs id="SvgjsDefs1060">
                                                <clipPath id="gridRectMaskbl8tlcp1">
                                                    <rect id="SvgjsRect1062" width="373" height="395" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                                </clipPath>
                                                <clipPath id="gridRectMarkerMaskbl8tlcp1">
                                                    <rect id="SvgjsRect1063" width="411" height="433" x="-20" y="-20" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                                </clipPath>
                                                <filter id="SvgjsFilter1075" filterUnits="userSpaceOnUse">
                                                    <feFlood id="SvgjsFeFlood1076" flood-color="#b6c2e4" flood-opacity="0.35" result="SvgjsFeFlood1076Out" in="SourceGraphic"></feFlood>
                                                    <feComposite id="SvgjsFeComposite1077" in="SvgjsFeFlood1076Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1077Out"></feComposite>
                                                    <feOffset id="SvgjsFeOffset1078" dx="0" dy="5" result="SvgjsFeOffset1078Out" in="SvgjsFeComposite1077Out"></feOffset>
                                                    <feGaussianBlur id="SvgjsFeGaussianBlur1079" stdDeviation="5 " result="SvgjsFeGaussianBlur1079Out" in="SvgjsFeOffset1078Out"></feGaussianBlur>
                                                    <feMerge id="SvgjsFeMerge1080" result="SvgjsFeMerge1080Out" in="SourceGraphic">
                                                        <feMergeNode id="SvgjsFeMergeNode1081" in="SvgjsFeGaussianBlur1079Out"></feMergeNode>
                                                        <feMergeNode id="SvgjsFeMergeNode1082" in="[object Arguments]"></feMergeNode>
                                                    </feMerge>
                                                    <feBlend id="SvgjsFeBlend1083" in="SourceGraphic" in2="SvgjsFeMerge1080Out" mode="normal" result="SvgjsFeBlend1083Out"></feBlend>
                                                </filter>
                                                <filter id="SvgjsFilter1087" filterUnits="userSpaceOnUse">
                                                    <feFlood id="SvgjsFeFlood1088" flood-color="#b6c2e4" flood-opacity="0.35" result="SvgjsFeFlood1088Out" in="SourceGraphic"></feFlood>
                                                    <feComposite id="SvgjsFeComposite1089" in="SvgjsFeFlood1088Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1089Out"></feComposite>
                                                    <feOffset id="SvgjsFeOffset1090" dx="0" dy="5" result="SvgjsFeOffset1090Out" in="SvgjsFeComposite1089Out"></feOffset>
                                                    <feGaussianBlur id="SvgjsFeGaussianBlur1091" stdDeviation="5 " result="SvgjsFeGaussianBlur1091Out" in="SvgjsFeOffset1090Out"></feGaussianBlur>
                                                    <feMerge id="SvgjsFeMerge1092" result="SvgjsFeMerge1092Out" in="SourceGraphic">
                                                        <feMergeNode id="SvgjsFeMergeNode1093" in="SvgjsFeGaussianBlur1091Out"></feMergeNode>
                                                        <feMergeNode id="SvgjsFeMergeNode1094" in="[object Arguments]"></feMergeNode>
                                                    </feMerge>
                                                    <feBlend id="SvgjsFeBlend1095" in="SourceGraphic" in2="SvgjsFeMerge1092Out" mode="normal" result="SvgjsFeBlend1095Out"></feBlend>
                                                </filter>
                                                <filter id="SvgjsFilter1099" filterUnits="userSpaceOnUse">
                                                    <feFlood id="SvgjsFeFlood1100" flood-color="#b6c2e4" flood-opacity="0.35" result="SvgjsFeFlood1100Out" in="SourceGraphic"></feFlood>
                                                    <feComposite id="SvgjsFeComposite1101" in="SvgjsFeFlood1100Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite1101Out"></feComposite>
                                                    <feOffset id="SvgjsFeOffset1102" dx="0" dy="5" result="SvgjsFeOffset1102Out" in="SvgjsFeComposite1101Out"></feOffset>
                                                    <feGaussianBlur id="SvgjsFeGaussianBlur1103" stdDeviation="5 " result="SvgjsFeGaussianBlur1103Out" in="SvgjsFeOffset1102Out"></feGaussianBlur>
                                                    <feMerge id="SvgjsFeMerge1104" result="SvgjsFeMerge1104Out" in="SourceGraphic">
                                                        <feMergeNode id="SvgjsFeMergeNode1105" in="SvgjsFeGaussianBlur1103Out"></feMergeNode>
                                                        <feMergeNode id="SvgjsFeMergeNode1106" in="[object Arguments]"></feMergeNode>
                                                    </feMerge>
                                                    <feBlend id="SvgjsFeBlend1107" in="SourceGraphic" in2="SvgjsFeMerge1104Out" mode="normal" result="SvgjsFeBlend1107Out"></feBlend>
                                                </filter>
                                            </defs>
                                            <g id="SvgjsG1065" class="apexcharts-radialbar">
                                                <g id="SvgjsG1066">
                                                    <g id="SvgjsG1067">
                                                        <g id="apexcharts-series-0" class="apexcharts-series apexcharts-radial-series Completed" rel="1">
                                                            <path id="apexcharts-radialbar-slice-0" d="M 185.5 30.657012195121936 A 101.84298780487806 101.84298780487806 0 1 1 164.32565220755538 232.1174741729037" fill="none" fill-opacity="0.85" stroke="rgba(30,202,184,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="10.283536585365855" stroke-dasharray="0" class="apexcharts-radialbar-area" data:angle="192" data:value="71" filter="url(#SvgjsFilter1075)" index="0" j="0" data:pathOrig="M 185.5 30.657012195121936 A 101.84298780487806 101.84298780487806 0 1 1 164.32565220755538 232.1174741729037"></path>
                                                        </g>
                                                        <g id="apexcharts-series-1" class="apexcharts-series apexcharts-radial-series Active" rel="2">
                                                            <path id="apexcharts-radialbar-slice-1" d="M 185.5 45.94054878048779 A 86.55945121951221 86.55945121951221 0 0 1 200.53089096411784 217.74441865745766" fill="none" fill-opacity="0.85" stroke="rgba(253,60,151,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="10.283536585365855" stroke-dasharray="0" class="apexcharts-radialbar-area" data:angle="170" data:value="63" filter="url(#SvgjsFilter1087)" index="0" j="1" data:pathOrig="M 185.5 45.94054878048779 A 86.55945121951221 86.55945121951221 0 0 1 200.53089096411784 217.74441865745766"></path>
                                                        </g>
                                                        <g id="apexcharts-series-2" class="apexcharts-series apexcharts-radial-series Assigned" rel="3">
                                                            <path id="apexcharts-radialbar-slice-2" d="M 185.5 61.22408536585364 A 71.27591463414636 71.27591463414636 0 1 1 114.22408536585364 132.5" fill="none" fill-opacity="0.85" stroke="rgba(109,129,245,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="10.283536585365855" stroke-dasharray="0" class="apexcharts-radialbar-area" data:angle="270" data:value="100" filter="url(#SvgjsFilter1099)" index="0" j="2" data:pathOrig="M 185.5 61.22408536585364 A 71.27591463414636 71.27591463414636 0 1 1 114.22408536585364 132.5"></path>
                                                        </g>
                                                        <circle id="SvgjsCircle1068" r="61.28839939024391" cx="185.5" cy="132.5" class="apexcharts-radialbar-hollow" fill="transparent"></circle>
                                                        <g id="SvgjsG1069" class="apexcharts-datalabels-group" transform="translate(0, 0)" style="opacity: 0;">
                                                            <text id="SvgjsText1070" font-family="Helvetica, Arial, sans-serif" x="185.5" y="132.5" text-anchor="middle" dominant-baseline="auto" font-size="18px" fill="#1ecab8" class="apexcharts-datalabel-label" style="font-family: Helvetica, Arial, sans-serif;"></text>
                                                            <text id="SvgjsText1071" font-family="Helvetica, Arial, sans-serif" x="185.5" y="164.5" text-anchor="middle" dominant-baseline="auto" font-size="16px" fill="#50649c" class="apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;"></text>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                            <line id="SvgjsLine1108" x1="0" y1="0" x2="371" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                            <line id="SvgjsLine1109" x1="0" y1="0" x2="371" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <div class="resize-triggers">
                                <div class="expand-trigger">
                                    <div style="width: 394px; height: 301px;"></div>
                                </div>
                                <div class="contract-trigger"></div>
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Projects Workload</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div id="work_load" class="morris-chart workload-chart drop-shadow">
                                    <svg height="210" version="1.1" width="409.328" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.5px;">
                                        <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc>
                                        <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                                        <path fill="none" stroke="#1ecab8" d="M204.664,168.33333333333334A63.333333333333336,63.333333333333336,0,0,0,252.08633038828717,146.9789672533192" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path>
                                        <path fill="#1ecab8" stroke="#000000" d="M204.664,171.33333333333334A66.33333333333334,66.33333333333334,0,0,0,254.33265130141655,148.96744464952906L272.05362739388175,164.65432188629572A90,90,0,0,1,204.664,195Z" stroke-opacity="0" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                        <path fill="none" stroke="#fd3c97" d="M252.08633038828717,146.9789672533192A63.333333333333336,63.333333333333336,0,0,0,233.1816082027962,48.45040111987601" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path>
                                        <path fill="#fd3c97" stroke="#000000" d="M254.33265130141655,148.96744464952906A66.33333333333334,66.33333333333334,0,0,0,234.53244227556027,45.77173590976487L245.18902218292095,24.640043696665913A90,90,0,0,1,272.05362739388175,164.65432188629572Z" stroke-opacity="0" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                        <path fill="none" stroke="#6d81f5" d="M233.1816082027962,48.45040111987601A63.333333333333336,63.333333333333336,0,1,0,204.64410324685454,168.33333020795862" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path>
                                        <path fill="#6d81f5" stroke="#000000" d="M234.53244227556027,45.77173590976487A66.33333333333334,66.33333333333334,0,1,0,204.64316076907397,171.33333005991457L204.63415487028183,199.99999531193794A95,95,0,1,1,247.44041230419435,20.175601679814022Z" stroke-opacity="0" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                        <text x="204.664" y="95" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#50649c" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(1.5079,0,0,1.5079,-104.0833,-53.5873)" stroke-width="0.6631578947368422">
                                            <tspan dy="5.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">P2</tspan>
                                        </text>
                                        <text x="204.664" y="115" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#50649c" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(1.0556,0,0,1.0556,-11.3702,-5.8333)" stroke-width="0.9473684210526315">
                                            <tspan dy="5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">230h</tspan>
                                        </text>
                                    </svg>
                                </div>
                                <ul class="list-unstyled text-center text-muted mb-0">
                                    <li class="list-inline-item font-13"><i class="mdi mdi-album font-16 text-blue mr-2"></i>External</li>
                                    <li class="list-inline-item font-13"><i class="mdi mdi-album font-16 text-pink mr-2"></i>Internal</li>
                                    <li class="list-inline-item font-13"><i class="mdi mdi-album font-16 text-light mr-2"></i>Other</li>
                                </ul>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                        <tr>
                                            <td class="border-top-0"><img src="../assets/images/widgets/project1.jpg" alt="" class="thumb-sm rounded-circle mr-1"> <span class="text-info">Book My World</span></td>
                                            <td class="border-top-0"><small class="float-right text-muted ml-3 font-14">121h</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 55%; border-radius:5px;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="../assets/images/widgets/project2.jpg" alt="" class="thumb-sm rounded-circle mr-1"> <span class="text-info">Organic Farming</span></td>
                                            <td><small class="float-right text-muted ml-3 font-14">522h</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 66%; border-radius:5px;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="../assets/images/widgets/project3.jpg" alt="" class="thumb-sm rounded-circle mr-1"> <span class="text-info">Marketech World</span></td>
                                            <td><small class="float-right text-muted ml-3 font-14">245h</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-blue" role="progressbar" style="width: 34%; border-radius:5px;" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="../assets/images/widgets/project4.jpg" alt="" class="thumb-sm rounded-circle mr-1"> <span class="text-info">Transfer money</span></td>
                                            <td><small class="float-right text-muted ml-3 font-14">80h</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 28%; border-radius:5px;" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <!--end row-->
                                </div>
                                <!--end table-responsive-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Tasks List</h4>
                        <div class="todo-list">
                            <div class="todo-box"><i class="remove far fa-trash-alt"></i>
                                <div class="todo-task">
                                    <label class="ckbox">
                                        <input type="checkbox"><span>Icon change in Redesign App</span></label>
                                </div>
                            </div>
                            <div class="todo-box"><i class="remove far fa-trash-alt"></i>
                                <div class="todo-task">
                                    <label class="ckbox">
                                        <input type="checkbox" checked=""><span>Add search button Market Research</span></label>
                                </div>
                            </div>
                            <div class="todo-box"><i class="remove far fa-trash-alt"></i>
                                <div class="todo-task">
                                    <label class="ckbox">
                                        <input type="checkbox"><span>Test new features in tablets</span></label>
                                </div>
                            </div>
                            <div class="todo-box"><i class="remove far fa-trash-alt"></i>
                                <div class="todo-task">
                                    <label class="ckbox">
                                        <input type="checkbox" checked=""><span>Send IOS App documents</span></label>
                                </div>
                            </div>
                            <div class="todo-box"><i class="remove far fa-trash-alt"></i>
                                <div class="todo-task">
                                    <label class="ckbox">
                                        <input type="checkbox"><span>Connect API to pages</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="input-group custom-input">
                            <input type="text" class="form-control todo-list-input" placeholder="Add task"> <span class="input-group-append"></span>
                            <button class="btn btn-primary add-new-todo-btn">Add</button>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 mb-3 header-title">All Projects</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Client Name</th>
                                            <th>Start Date</th>
                                            <th>Deadline</th>
                                            <th>Status</th>
                                            <th>Progress</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Product Devlopment</td>
                                            <td><img src="../assets/images/users/user-2.jpg" alt="" class="thumb-sm rounded-circle mr-2"> Kevin J. Heal</td>
                                            <td>20/3/2018</td>
                                            <td>5/5/2018</td>
                                            <td><span class="badge badge-boxed badge-soft-success">Active</span></td>
                                            <td><small class="float-right ml-2 pt-1 font-10">92%</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 92%;" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>New Office Building</td>
                                            <td><img src="../assets/images/users/user-3.jpg" alt="" class="thumb-sm rounded-circle mr-2"> Frank M. Lyons</td>
                                            <td>11/6/2018</td>
                                            <td>15/7/2018</td>
                                            <td><span class="badge badge-boxed badge-soft-warning">Panding</span></td>
                                            <td><small class="float-right ml-2 pt-1 font-10">0%</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Website &amp; Blog</td>
                                            <td><img src="../assets/images/users/user-4.jpg" alt="" class="thumb-sm rounded-circle mr-2"> Hyman M. Cross</td>
                                            <td>21/6/2018</td>
                                            <td>3/7/2018</td>
                                            <td><span class="badge badge-boxed badge-soft-warning">Panding</span></td>
                                            <td><small class="float-right ml-2 pt-1 font-10">0%</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Market Research</td>
                                            <td><img src="../assets/images/users/user-5.jpg" alt="" class="thumb-sm rounded-circle mr-2"> Angelo E. Butler</td>
                                            <td>30/4/2018</td>
                                            <td>1/6/2018</td>
                                            <td><span class="badge badge-boxed badge-soft-success">Active</span></td>
                                            <td><small class="float-right ml-2 pt-1 font-10">78%</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 78%;" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Export Marketing</td>
                                            <td><img src="../assets/images/users/user-6.jpg" alt="" class="thumb-sm rounded-circle mr-2"> Robert C. Golding</td>
                                            <td>20/3/2018</td>
                                            <td>5/5/2018</td>
                                            <td><span class="badge badge-boxed badge-soft-success">Active</span></td>
                                            <td><small class="float-right ml-2 pt-1 font-10">45%</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Product Devlopment</td>
                                            <td><img src="../assets/images/users/user-7.jpg" alt="" class="thumb-sm rounded-circle mr-2"> Kevin J. Heal</td>
                                            <td>14/2/2018</td>
                                            <td>10/8/2018</td>
                                            <td><span class="badge badge-boxed badge-soft-success">Active</span></td>
                                            <td><small class="float-right ml-2 pt-1 font-10">35%</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>New Office Building</td>
                                            <td><img src="../assets/images/users/user-3.jpg" alt="" class="thumb-sm rounded-circle mr-2"> Frank M. Lyons</td>
                                            <td>11/6/2018</td>
                                            <td>15/7/2018</td>
                                            <td><span class="badge badge-boxed badge-soft-warning">Panding</span></td>
                                            <td><small class="float-right ml-2 pt-1 font-10">0%</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Website &amp; Blog</td>
                                            <td><img src="../assets/images/users/user-8.jpg" alt="" class="thumb-sm rounded-circle mr-2"> Phillip T. Morse</td>
                                            <td>8/4/2018</td>
                                            <td>2/6/2018</td>
                                            <td><span class="badge badge-boxed badge-soft-danger">Complete</span></td>
                                            <td><small class="float-right ml-2 pt-1 font-10">100%</small>
                                                <div class="progress mt-2" style="height:5px;">
                                                    <div class="progress-bar bg-pink" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--end table-responsive-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Activity</h4>
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 363px;">
                            <div class="slimscroll project-dash-activity" style="overflow: hidden; width: auto; height: 363px;">
                                <div class="activity"><i class="mdi mdi-check icon-success"></i>
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="text-muted text-right font-10">5 minutes ago</div>
                                            <h5 class="mt-0">Task finished</h5>
                                            <p class="text-muted font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="#" class="text-info">[more info]</a></p>
                                        </div>
                                    </div><i class="mdi mdi-alert-outline icon-warning"></i>
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="text-muted text-right font-10">30 minutes ago</div>
                                            <h5 class="mt-0">Task Overdue</h5>
                                            <p class="text-muted font-13">Lorem ipsum dolor sit amet. <a href="#" class="text-info">[more info]</a></p>
                                        </div>
                                    </div><i class="mdi mdi-code-tags-check icon-pink"></i>
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="text-muted text-right font-10">50 minutes ago</div>
                                            <h5 class="mt-0">Complete code check</h5>
                                            <p class="text-muted font-13">There are many variations of passages of Lorem Ipsum available. <a href="#" class="text-info">[more info]</a></p>
                                        </div>
                                    </div><i class="mdi mdi-comment-outline icon-purple"></i>
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="text-muted text-right font-10">1 Day ago</div>
                                            <h5 class="mt-0">New Comment</h5>
                                            <p class="text-muted font-13">Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="#" class="text-info">[more info]</a></p>
                                        </div>
                                    </div><i class="mdi mdi-clock-start icon-secondary"></i>
                                    <div class="time-item">
                                        <div class="item-info">
                                            <div class="text-muted text-right font-10">5 minutes ago</div>
                                            <h5 class="my-0">Start New Project</h5>
                                            <p class="text-muted font-13">Lorem ipsum dolor sit amet. <a href="#" class="text-info">[more info]</a></p>
                                        </div>
                                    </div>
                                </div>
                                <!--end activity-->
                            </div>
                            <div class="slimScrollBar" style="background: rgb(235, 240, 246); width: 7px; position: absolute; top: 0px; opacity: 1; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 450.748px;"></div>
                            <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                        </div>
                        <!--end project-dash-activity-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
@endsection
