@section('title')
    {{__('bands.request')}}
@endsection

@component('auth.components.auth_form')
    @slot('title')
        {{__('bands.request')}}
    @endslot

    @slot('form')
        @if(! session()->has('bandCreated'))
            <form method="POST" action="{{route('bands.request')}}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="name">
                        <i class="fa fa-users"></i> {{__('bands.name')}}
                    </label>
                    <input id="band_name" type="text" name="band_name" class="form-control @error('band_name')  is-invalid @enderror" value="{{old('band_name')}}" required>
                    @error('band_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="band_description">
                        <i class="fa fa-pencil"></i> {{__('bands.description')}}
                    </label>
                    <textarea class="form-control" name="band_description" rows="8" required>{{old('band_description')}}</textarea>
                    @error('band_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="email">
                        <i class="fa fa-envelope"></i> {{__('bands.contact_email')}}
                    </label>
                    <input id="email" type="email" name="owner_email" class="form-control @error('owner_email')  is-invalid @enderror" value="{{old('owner_email')}}" required>
                    @error('owner_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="members_count">
                        <i class="fa fa-user-times"></i> {{__('bands.members_count')}}
                    </label>
                    <input id="members_count" type="number" name="members_count" class="form-control @error('members_count')  is-invalid @enderror" min="1" max="100" value="{{old('members_count') ?: 1}}" required>
                    @error('members_count')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-outline-primary" title="Submit">
                        <i class="fa fa-check"></i> {{__('bands.send')}}
                    </button>
                </div>
            </form>
        @else
            <div class="card-body">
                {{session()->get('bandCreated')}}
            </div>
        @endif
    @endslot
@endcomponent

