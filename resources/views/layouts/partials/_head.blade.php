<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta content="{{site('description')}}" name="description">
    <meta content="A||F" name="author">
    <meta name="msvalidate.01" content="8880DD021FC9B6640F452CD787190C21" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- App favicon -->
    <link rel="icon" href="{{site('icon')}}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{site('icon')}}">
    <!-- App css -->
    <link href="{{theme('css', 'bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{theme('css', 'icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{theme('css', 'metisMenu.min.css')}}" rel="stylesheet" type="text/css">

    @if(currentDir() == 'ltr')
        <link href="{{theme('css', 'style.css')}}" rel="stylesheet" type="text/css">
    @else
        <link href="{{theme('css', 'style.rtl.css')}}" rel="stylesheet" type="text/css">
    @endif
    @include('layouts.partials.__site_init')
    @stack('styles')
</head>
