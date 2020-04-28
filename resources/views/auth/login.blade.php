@section('title') {{site('name')}} | {{__('auth.login')}} @endsection
@component('auth.components.auth_form')
    @slot('title')
        {{__('auth.login_to_account')}}
    @endslot
    @slot('form')
        <form method="POST" class="form-horizontal auth-form my-4" action="{{route('login')}}">
            @csrf
            <div class="form-group">
                <label for="username">{{__('auth.username_or_email')}}</label>
                <div class="input-group mb-3">
                    <span class="auth-form-icon"><i class="fa fa-user"></i> </span>
                    <input
                        type="text"
                        class="form-control @error('username') is-invalid @enderror @error('email') is-invalid @enderror"
                        name="username"
                        id="username">
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!--end form-group-->
            <div class="form-group">
                <label for="userpassword">{{__('auth.password')}}</label>
                <div class="input-group mb-3">
                    <span class="auth-form-icon"><i class="fa fa-lock"></i> </span>
                    <input
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password"
                        id="userpassword">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <!--end form-group-->
            <div class="form-group row mt-4">
                <div class="col-sm-6">
                    <div class="custom-control custom-switch switch-success">
                        <input type="checkbox" class="custom-control-input" name="remember" id="customSwitchSuccess">
                        <label class="custom-control-label text-muted" for="customSwitchSuccess">{{__('auth.remember')}}</label>
                    </div>
                </div>
                <!--end col-->
                @if (Route::has('password.request'))
                    <div class="col-sm-6 text-right">
                        <a href="{{route('password.request')}}" class="text-muted font-13">
                            <i class="fa fa-lock"></i>
                            {{__('auth.forget_password')}}
                        </a>
                    </div>
                @endif
                <!--end col-->
            </div>
            <!--end form-group-->
            <div class="form-group mb-0 row">
                <div class="col-12 mt-2">
                    <button
                        class="btn btn-primary btn-round btn-block waves-effect waves-light" type="submit">
                        {{__('auth.login')}} <i class="fa fa-sign-in-alt"></i>
                    </button>
                </div>
                <!--end col-->
            </div>
            <!--end form-group-->
        </form>
        <!--end form-->
    @endslot
@endcomponent


