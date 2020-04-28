<!doctype html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <title>طلب الالتحاق ب Squadrons</title>
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
    <link href="{{theme('css', 'icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{theme('css', 'metisMenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">
    <link href="{{theme('css', 'style.rtl.css')}}" rel="stylesheet" type="text/css">
    <style>
        *, body {
            font-family: 'Tajawal', sans-serif;
        }
    </style>
</head>

<body>
    <div id="app" style="height:100%">
        <interview-form></interview-form>
        <!--end card-->
    </div>
<!-- Scripts  -->
<script src="{{theme('js', 'jquery.min.js')}}"></script>
<script src="{{theme('js', 'bootstrap.bundle.min.js')}}"></script>
<script src="{{theme('js', 'metisMenu.min.js')}}"></script>
<script src="{{theme('js', 'waves.min.js')}}"></script>
<script src="/js/guest.js"></script>
</body>

</html>
