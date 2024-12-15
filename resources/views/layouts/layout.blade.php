<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title> Online Registration</title>
    <meta name="author" content="themeholy" />
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />

    <link rel="manifest" href="{{ asset('front/img/favicons/manifest.html') }}" />
    <meta name="msapplication-TileColor" content="#ffffff" />

    <meta name="theme-color" content="#ffffff" />
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />

    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&amp;family=Jost:wght@300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('home/css/app.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('home/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}" />


</head>

<body>
    <div class="preloader">
        <button class="th-btn style3 preloaderCls">Cancel Preloader</button>
        <div class="preloader-inner"><span class="loader"></span></div>
    </div>
    @yield('main-section')
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="
              transition: stroke-dashoffset 10ms linear 0s;
              stroke-dasharray: 307.919, 307.919;
              stroke-dashoffset: 307.919;
            ">
            </path>
        </svg>
    </div>
    <script src="{{ asset('home/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('home/js/app.min.js') }}"></script>
    <script src="{{ asset('home/js/main.js') }}"></script>

</body>

</html>
