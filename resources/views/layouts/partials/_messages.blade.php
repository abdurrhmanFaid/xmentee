@if(session()->has('success'))
    <div class="alert alert-success-shadow">
        <i class="fa fa-thumbs-up"></i> {{session()->get('success')}}
    </div>
@endif

@if(session()->has('failed'))
    <div class="alert alert-danger-shadow">{{session()->get('failed')}}</div>
@endif
