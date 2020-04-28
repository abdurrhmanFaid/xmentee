@component('mail::message')
# Hey {{$requestedBand->owner_name}}

Your band '{{$requestedBand->band_name}}' has been approved in {{site('name')}}. Now you can start managing your team, students now.
<hr>

All you have to do is <a href="{{route('register')}}">Registering</a> an account with this ticket.

Ticket Code: {{$ticket->code}}<br>
Ticket Password: {{$ticket->password}}

<hr>


Anyone use this ticket while Registration he will be an instructor for {{$requestedBand->band_name}} with you.

@component('mail::button', ['url' => route('register')])
Go and register now.
@endcomponent

Thanks,<br>
{{ config('site.name') }}
@endcomponent
