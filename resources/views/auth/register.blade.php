@section('title')
    {{__('auth.join')}}
@endsection

@component('auth.components.auth_form')
    @slot('title')
        <i class="fa fa-user-plus"></i> {{__('auth.join')}}
    @endslot
    @slot('form')
        <form method="POST" class="form-horizontal auth-form my-4" action="{{route('register')}}">
            @csrf
            @if(session()->has('invalidTicket'))
                <div class="alert alert-warning">{{session()->get('invalidTicket')}}</div>
            @endif
            <div class="form-group">
                <div class="input-group mb-3">
                    <span class="auth-form-icon"><i class="fa fa-ticket-alt"></i> </span>
                    <input
                        type="text"
                        placeholder="{{__('tickets.code')}}"
                        class="form-control @error('ticket_code') is-invalid @enderror"
                        name="ticket_code">
                    @error('ticket_code')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <span class="auth-form-icon"><i class="fa fa-unlock-alt"></i> </span>
                    <input
                        type="text"
                        placeholder="{{__('tickets.enter_password')}}"
                        class="form-control @error('ticket_secret') is-invalid @enderror"
                        name="ticket_secret">
                    @error('ticket_secret')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <span class="auth-form-icon"><i class="fa fa-envelope"></i> </span>
                    <input
                        type="email"
                        placeholder="{{__('auth.email')}}"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <span class="auth-form-icon"><i class="fa fa-lock"></i> </span>
                    <input
                        type="password"
                        placeholder="{{__('auth.password')}}"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <span class="auth-form-icon"><i class="fa fa-lock"></i> </span>
                    <input
                        type="password"
                        placeholder="{{__('auth.confirm_password')}}"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-success btn-round btn-block waves-effect waves-light" title="Join">
                    <i class="fa fa-user-plus"></i> {{__('auth.register')}}
                </button>
            </div>
        </form>
        <div class="text-center text-muted mb-3">
            {{__('auth.already_have_account')}} <a href="{{route('login')}}">{{__('auth.login')}}</a>
        </div>
    @endslot
@endcomponent
