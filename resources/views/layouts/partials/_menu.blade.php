<!-- MENU Start -->
<div class="navbar-custom-menu">
    <div class="container-fluid">
        <div id="navigation">
            <ul class="navigation-menu">
                <!-- Navigation Menu-->
                <li class="has-submenu">
                    <a href="#">
                        <i class="ti ti-shield"></i> {{$band->name}}
                    </a>
                    <ul class="submenu">
                        @instructor
                        <li>
                            <a href="{{route('bands.edit', $band->slug)}}">
                                <i class="fa fa-cogs"></i>{{__('menus.bands.settings')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('batches.index')}}">
                                <i class="fa fa-users"></i>{{__('menus.batches.name')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('bands.messaging.show', $band->slug)}}">
                                <i class="fa fa-comment"></i>{{__('menus.bands.external_messaging')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('lessons.create')}}">
                                <i class="fa fa-video"></i>{{__('menus.lessons.create')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('payments.index')}}">
                                <i class="fa fa-money-bill-wave"></i>{{__('menus.payments.name')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('payments.create')}}">
                                <i class="fa fa-money-bill-wave"></i>{{__('menus.payments.create')}}
                            </a>
                        </li>
                        @endinstructor
                    </ul>
                    <!--end submenu-->
                </li>
                @instructor
                <li class="has-submenu">
                    <a href="#">
                        <i class="ti ti-ticket"></i> {{__('menus.tickets.name')}}
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{route('tickets.index')}}">
                                <i class="ti ti-share"></i>{{__('menus.tickets.requested')}}</a>
                        </li>
                        <li>
                            <a href="{{route('tickets.unrequested.index')}}">
                                <i class="ti ti-share-alt"></i>{{__('menus.tickets.unrequested')}}</a>
                        </li>
                    </ul>
                    <!--end submenu-->
                </li>
                @endinstructor
                <li class="has-submenu">
                    <a href="{{route('categories.index')}}">
                        <i class="ti ti-shield"></i> {{__('menus.categories.name')}}
                    </a>
                    <ul class="submenu">
                        @foreach($categories as $category)
                            <li>
                                <a href="{{route('categories.show', $category->slug)}}">
                                    <i class="ti ti-view-list"></i> {{$category->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <!--end submenu-->
                </li>
                <li class="has-submenu">
                    <a href="{{route('lessons.index')}}">
                        <i class="fa fa-video"></i> {{__('menus.lessons.name')}}
                    </a>
                </li>
                <li class="has-submenu">
                    <a href="{{route('posts.index')}}">
                        <i class="ti ti-shield"></i> {{__('menus.posts.name')}}
                    </a>
                    <ul class="submenu">
                        @foreach (postTypes() as $type)
                            <li>
                                <a href="{{route('posts.index', ['types' => $type])}}">
                                    <i class="ti ti-tag"></i> {{__('posts.types.' . $type)}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <!--end submenu-->
                </li>
                <li class="has-submenu">
                    <a href="{{route('groups.index')}}">
                        <i class="fa fa-users"></i> {{__('menus.groups.name')}}
                    </a>
                </li>
                <li class="has-submenu">
                    <a href="{{route('tasks.index')}}">
                        <i class="fa fa-tasks"></i> {{__('menus.tasks.name')}}
                    </a>
                </li>
            </ul>
            <!-- End navigation menu -->
        </div>
        <!-- end navigation -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end navbar-custom -->
