@section('title') {{__('auth.reset_pass')}} @endsection
@component('auth.components.auth_form')
    @slot('title')
        {{ __('auth.reset_pass') }}
    @endslot
    @slot('form')
        <form class="form-horizontal auth-form my-4" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-info-shadow" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="form-group">
                    <input id="email" type="email" name="email" class="form-control @error('email')  is-invalid @enderror" placeholder="{{__('auth.email')}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-footer">
                    <button
                        class="btn btn-primary btn-round btn-block waves-effect waves-light" type="submit">
                        {{__('auth.reset_pass')}} <i class="fa fa-sign-in-alt"></i>
                    </button>
                </div>
            </div>
        </form>
    @endslot
@endcomponent
