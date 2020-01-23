<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

<!-- Meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- CSS -->
<!-- Ionicons-->
<link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/22bac37b12.js"></script>

<!-- Bootstrap -->
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">

<!-- icon -->
<link rel="shortcut icon" href="/img/logo/logo-mpsc.png" type="image/x-icon">

<title>Admin :: @yield('title-bar') | Manuscript Preservation and Study Center</title>

</head>
<body>

{{-- nav --}}
@include('layouts.nav-admin')
<br>

@yield('content')
<br>

<div class="fixed-bottom d-flex flex-row-reverse bg-secondary">
    <p class="d-inline footer text-light p-1 float-right"><small>@yield('title-bar') | Manuscript Preservation and Study Center</small></p>
</div>

<!-- JavaScript -->
<script src="{{asset('/js/jquery.js')}}"></script>
<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('/js/script.js')}}"></script>


</body>
</html>