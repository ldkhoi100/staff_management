<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>@yield('title')</title>
    <base href="{{ asset('') }}">

    <!-- Fonts Style -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <link rel="stylesheet" href="css/fontawesome.min.css" type="text/css"> --}}

    <!-- Styles Bootstrap -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" />
    {{-- <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"> --}}
    <link rel="stylesheet" href="css/toastr.min.css" type="text/css">

</head>

<body>