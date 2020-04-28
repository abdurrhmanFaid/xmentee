<div style="margin: auto;" class="d-block">
    @if(!request()->routeIs('login') && !request()->routeIs('register'))
        <a href="{{route('login')}}" class="btn btn-primary btn-sm">
            <span>{{__('auth.login')}} <i class="fa fa-sign-in-alt"></i></span>
        </a>
    @endif
    @if(!request()->routeIs('register'))
        <a href="{{route('register')}}" class="btn btn-success btn-sm">
            <span>{{__('auth.register')}} <i class="fa fa-user-plus"></i></span>
        </a>
    @endif
    @if(!request()->routeIs('bands.request'))
        <a href="{{route('bands.request')}}" class="btn btn-info btn-sm">
            <span>{{__('bands.request_btn_txt')}} <i class="fa fa-users"></i></span>
        </a>
    @endif
    @if(!request()->routeIs('tickets.request') && !request()->routeIs('password.request'))
        <a href="{{route('tickets.request')}}" class="btn btn-primary btn-sm">
            <span>{{__('tickets.request_ticket')}} <i class="fa fa-ticket-alt"></i></span>
        </a>
    @endif
    <hr>
        <a href="{{route('lang', ['locale' => 'ar', 'redirectTo' => \Illuminate\Support\Facades\URL::current()])}}">العربية</a>
        |
        <a href="{{route('lang', ['locale' => 'en', 'redirectTo' => \Illuminate\Support\Facades\URL::current()])}}">English</a>
</div>
