<!doctype html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <title>Accepted members to join the team</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta content="{{site('description')}}" name="description">
    <meta content="A||F" name="author">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- App favicon -->
    <link rel="icon" href="{{site('icon')}}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{site('icon')}}">
    <!-- App css -->
    <link href="{{theme('css', 'bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">
    <link href="{{theme('css', 'style.css')}}" rel="stylesheet" type="text/css">
    <style>
        *, body {
            font-family: 'Tajawal', sans-serif;
        }
    </style>
</head>

<body class="account-body accountbg">
<div class="container mt-100">
    <div class="card">
        <div class="card-body">
            <h3>
                <strong>Accepted members to join the Squadrons Team</strong>
            </h3>
            <p class="text-muted mb-3">
                <a href="{{route('register')}}" class="btn btn-outline-success btn-square waves-effect waves-light" target="_blank">Register an account</a>
            </p>

            <div class="table-responsive-sm text-center">
                <table class="table table-sm mb-0">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Ticket</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($approved as $index => $ticket)
                        <tr>
                            <th scope="row">{{$index + 1}}</th>
                            <td>{{$ticket->owner_name}}</td>
                            <td>{{$ticket->code}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!--end /table-->
            </div>
            <!--end /tableresponsive-->
        </div>
        <!--end card-body-->
    </div>
    <div>
        <h6 class="my-4"></h6>
        <footer class="text-center position-relative" style="padding: 20px;">
            <span class="d-block">
                Copyright &copy; {{date('Y')}} {{site('name')}}
            </span>
            <span class="text-muted d-sm-inline-block">
                Built with <i class="fa fa-heartbeat text-danger"></i> by A||F
            </span>
        </footer>
    </div>
</div>
</body>

</html>
