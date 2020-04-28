@section('title')
    {{__('tickets.get')}}
@endsection

@component('auth.components.auth_form')

    @slot('title')
        <i class="fa fa-ticket"></i> {{__('tickets.get')}}
    @endslot

    @slot('form')
        <generate-ticket-form :bands="{{$bands}}"></generate-ticket-form>
    @endslot

    @slot('scripts')
        <script src="/js/lang.js"></script>
        <script src="/js/guest.js"></script>
    @endslot

@endcomponent
