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


<?php 
    if (isset($manuscripts_blog)) {
        $j = 0;
        foreach ($manuscripts_blog as $item) {
            if ($j <= 0) {

                $temp_title = $item->manuscripts_blog_name;
                $temp_url = "http://www.mps-center.in.th";
                $temp_type = "website";
                $temp_description = $item->manuscripts_blog_detail;
                $temp_image = $item->manuscripts_blog_image;
                
                $j++;
            }
        }
    } 
    else {
        $temp_title = "กลุ่มอนุรักษ์และศึกษาคัมภีร์พระไตรปิฎกใบลาน";
        $temp_url = "http://www.mps-center.in.th";
        $temp_type = "website";
        $temp_description = "Maunscript Preservation and Study Center";
        $temp_image = "https://www.your-domain.com/path/image.jpg";
    }
?>

<meta property="og:title"         content={{ strval($temp_title) }}/>
<meta property="og:url"           content={{ strval($temp_url) }}/>
<meta property="og:type"          content={{ strval($temp_type) }}/>
<meta property="og:description"   content={{ strval($temp_description) }}/>
<meta property="og:image"           content={{ asset($temp_image) }}>


<title>@yield('title-bar') | กลุ่มอนุรักษ์และศึกษาคัมภีร์พระไตรปิฎกใบลาน</title>

</head>
<body>
{{-- nav --}}
@include('layouts.nav')

<div class="container-xl">
    @yield('content')
</div>

@include('layouts.footer')


<!-- Google Analytic -->
<script async src='https://www.googletagmanager.com/gtag/js?id=UA-145708508-1'></script>

<!-- Google Search Custom -->
<script async src="https://cse.google.com/cse.js?cx=008341805127915127433:42dxa5yxayl"></script>

{{-- fb share --}}
<div id="fb-root"></div>
<script 
    async defer crossorigin="anonymous" 
    src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v6.0&appId=497542534276270&autoLogAppEvents=1">
</script>

{{-- line share --}}
<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>

{{-- Google Analytic --}}
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-145708508-1');
</script>

<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
    _Hasync.push(['Histats.start', '1,4386241,4,605,110,55,00011001']);
    _Hasync.push(['Histats.fasi', '1']);
    _Hasync.push(['Histats.track_hits', '']);
    (function() {
    var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
    hs.src = ('//s10.histats.com/js15_as.js');
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
    })();
</script>
<!-- Histats.com  END  -->

<!-- JavaScript -->
<script src="{{asset('/js/jquery.js')}}"></script>
<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('/js/script.js')}}"></script>

</body>
</html>