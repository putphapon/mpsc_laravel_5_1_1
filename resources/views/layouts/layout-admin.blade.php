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

{{-- WYSIWYG editor --}}
<script src="https://cdn.tiny.cloud/1/b1pl6nju1mhg10k75rstxaj2h9bzuj1q9fmdx70ubm8h3u00/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
    _Hasync.push(['Histats.start', '1,4386241,4,605,110,55,00011001']);
    _Hasync.push(['Histats.fasi', '1']);
    _Hasync.push(['Histats.track_hits', '0']);
    (function() {
    var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
    hs.src = ('//s10.histats.com/js15_as.js');
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
    })();
</script>
<!-- Histats.com  END  -->

<title>Admin :: @yield('title-bar') | กลุ่มอนุรักษ์และศึกษาคัมภีร์พระไตรปิฎกใบลาน</title>

</head>
<body>

{{-- nav --}}
<div class="container">
    @include('layouts.nav-admin')
</div>
<br>

@yield('content')
<br>

<div class="fixed-bottom d-flex justify-content-between bg-secondary">
    <p class="d-inline text-light m-0 p-1"><small>คุณเข้าระบบด้วย Email :: {{ Auth::user()->email }}</small></p>
    
    
    <p class="d-inline text-light m-0 p-1"><small>@yield('title-bar') | Manuscript Preservation and Study Center</small>
        <!-- Authentication Links -->
        @if(Auth::check())
            <a class="btn btn-outline-danger btn-sm" href="/auth/logout" role="button">ออกจากระบบ</a>
        @endif
    </p>
</div>

<!-- JavaScript -->
<script src="{{asset('/js/jquery.js')}}"></script>
<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('/js/script.js')}}"></script>


</body>
</html>