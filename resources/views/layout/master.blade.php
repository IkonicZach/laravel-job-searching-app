<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- favicon -->
    <link href="images/favicon.ico" rel="shortcut icon">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css/tiny-slider.css" rel="stylesheet" type="text/css">
    <link href="css/tobii.min.css" rel="stylesheet" type="text/css">
    <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
    <!-- Custom  Css -->
    <link href="css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt">
    <style type="text/css" id="operaUserStyle"></style>
    <style></style>

    <!-- JAVASCRIPTS -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/tobii.min.js"></script>
    <script src="js/feather.min.js"></script>
    <!-- Custom -->
    <script src="js/plugins.init.js"></script>
    <script src="js/app.js"></script>
    <script src="https://kit.fontawesome.com/da36adc817.js"></script>
    <style type="text/css">
        .typewrite>.wrap {
            border-right: 0.08em solid transparent
        }
    </style>
</head>

<body>
    @yield('content')
    <div role="dialog" aria-hidden="true" class="tobii"><button class="tobii__prev" type="button"
            aria-label="Previous image"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                <path d="M14 18l-6-6 6-6"></path>
            </svg></button><button class="tobii__next" type="button" aria-label="Next image"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true"
                focusable="false">
                <path d="M10 6l6 6-6 6"></path>
            </svg></button><button class="tobii__close" type="button" aria-label="Close lightbox"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true"
                focusable="false">
                <path d="M6 6l12 12M6 18L18 6"></path>
            </svg></button>
        <div class="tobii__counter"></div>
        <div class="tobii__slider">
            <div class="tobii__slider-slide" style="position: absolute; left: 0%;">
                <div data-player="0" data-type="youtube"><iframe frameborder="0" allowfullscreen=""
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        title="Landrick Saas and Software Landing Page Template" width="640" height="360"
                        src="https://www.youtube-nocookie.com/embed/yba7hPeTSjk?controls=1&amp;rel=0&amp;playsinline=1&amp;enablejsapi=1&amp;widgetid=1"
                        id="widget2"></iframe></div>
            </div>
            <div class="tobii__slider-slide" style="position: absolute; left: 100%;">
                <div data-player="1" data-type="youtube"><iframe frameborder="0" allowfullscreen=""
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        title="Landrick Saas and Software Landing Page Template" width="640" height="360"
                        src="https://www.youtube-nocookie.com/embed/yba7hPeTSjk?controls=1&amp;rel=0&amp;playsinline=1&amp;enablejsapi=1&amp;widgetid=3"
                        id="widget4"></iframe></div>
            </div>
        </div>
    </div>
</body>
