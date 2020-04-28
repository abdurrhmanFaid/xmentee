<!DOCTYPE html>
<html lang="{{currentLocale()}}">
    @include('layouts.partials._head')
    <body>
        <div id="app">
            @include('layouts.partials._topbar')
            <div class="page-wrapper">
                <!-- Page Content-->
                <div class="page-content">
                    @include('layouts.partials._page_title_box')
                    @yield('content')
                    @include('layouts.partials._footer')
                </div>
            </div>
        </div>
        <!-- end page content -->
        @include('layouts.partials._scripts')
    </body>
</html>
