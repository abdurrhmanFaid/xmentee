<div class="container">
    @include('layouts.partials._messages')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    @yield('breadcrumbs')
                    <!--end breadcrumb-->
                </div>
                <!--end /div-->
                <h4 class="page-title">@yield('pageTitle')</h4>
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
</div>
