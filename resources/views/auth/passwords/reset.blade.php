@section('title')
    {{__('auth.reset_pass')}}
@endsection
@component('auth.components.auth_form')
    @slot('title')
        {{ __('auth.reset_pass') }}
    @endslot
    @slot('form')
        <form class="form-horizontal auth-form my-4" method="POST" action="{{route('password.update')}}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="card-body">
                <div class="form-group">
                    <label class="form-label" for="email">{{__('auth.email')}}</label>
                    <input id="email" type="email" name="email" class="form-control @error('email')  is-invalid @enderror" placeholder="{{__('auth.enter_email')}}" value="{{ $email ?? old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">{{__('auth.password')}}</label>
                    <input id="password" type="password" name="password" class="form-control @error('password')  is-invalid @enderror" placeholder="{{__('auth.enter_password')}}">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">{{__('auth.confirm_password')}}</label>
                    <input id="password" type="password" name="password_confirmation" class="form-control @error('password_confirmation')  is-invalid @enderror" placeholder="{{__('auth.confirm_password')}}">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-outline-success btn-block" title="Join">{{__('auth.reset_pass')}}</button>
                </div>
            </div>
        </form>
    @endslot
@endcomponent
