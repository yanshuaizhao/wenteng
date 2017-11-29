<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="description" content="@yield('description')" />
    <link href="/static/css/css.css" rel="stylesheet" type="text/css" />
    <link href="/static/css/animate.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/static/js/jquery.min.js"></script>
    <script type="text/javascript" src="/static/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript" src="/static/js/global.js"></script>
    <script type="text/javascript" src="/static/js/wow.min.js"></script>

    @yield('css')
</head>
<body>

@include('home.layouts.header')

@yield('banner')

@yield('content')

@include('home.layouts.footer')

@yield('js')

<script>
    $(document).ready(function(){
        var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: true,
            live: true
        });
        wow.init();
        jQuery(".tabbox").slide({effect:"leftLoop"});
    })

</script>
</body>
</html>
