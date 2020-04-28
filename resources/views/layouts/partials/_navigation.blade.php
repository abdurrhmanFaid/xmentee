<!-- Navbar -->
<nav class="topbar-main">
    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{route('home')}}" style="position:absolute; top: 10px">
            <h3><b>XM</b>entee</h3>
        </a>
    </div>
    <!--end logo-->
    <ul class="list-unstyled topbar-nav float-right mb-0">
        <notifications></notifications>
        <points></points>
        <li class="dropdown">
            <a
                class="nav-link dropdown-toggle waves-effect waves-light nav-user"
                data-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="false"
                aria-expanded="false">
                <img src="{{auth()->user()->formattedImage}}" title="{{auth()->user()->name}}" class="rounded-circle">
                <span class="ml-1 nav-user-name hidden-sm">
                        {{auth()->user()->name}} <i class="mdi mdi-chevron-down"></i>
                    </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{route('profiles.show')}}">
                    <i class="fa fa-user text-muted mr-2"></i> {{__('navigation.myProfile')}}
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('logout')}}">
                    <i class="fa fa-power-off text-muted mr-2"></i> {{__('navigation.logout')}}
                </a>
            </div>
        </li>
        <!--end dropdown-->
        <li class="menu-item">
            <!-- Mobile menu toggle-->
            <a class="navbar-toggle nav-link" id="mobileToggle">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
            <!-- End mobile menu toggle-->
        </li>
        <!--end menu item-->
    </ul>
    <!--end topbar-nav-->
    <ul class="list-unstyled topbar-nav mb-0">
        <li class="hide-phone app-search">
            <form role="search" class="">
                <input type="text" placeholder="Search..." class="form-control">
                <a href="#"><i class="fas fa-search"></i></a>
            </form>
        </li>
    </ul>
    <!--end topbar-nav-->
</nav>
