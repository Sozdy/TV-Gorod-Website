<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="Муниципальное учреждение «Информационное агентство «Город» (МУ «ИА «Город») — информагентство, миссией которой является оперативное, взвешенное и объективное освещение событий в городе Благовещенске и Амурской области, информирование аудитории о различных взглядах на ключевые события.">
    <meta name="keywords" content="новости, новости Город, Город 24, последние новости, новости Благовещенск, телекомпания Город, новости дня">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="«Информационное агентство «Город»">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="Муниципальное учреждение «Информационное агентство «Город» (МУ «ИА «Город») — информагентство, миссией которой является оперативное, взвешенное и объективное освещение событий в городе Благовещенске
и Амурской области, информирование аудитории о различных взглядах на ключевые события.">
    <meta property="og:url" content="http://example.com/page.html">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:image" content="http://example.com/img.jpg">
    <meta property="og:image:width" content="968">
    <meta property="og:image:height" content="504">

    <meta name="HandheldFriendly" content="True"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="MobileOptimzied" content="width">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="canonical" href="http://example.com/page.html">
    <link rel="alternate" hreflang="ru" href="http://example.com/page.html">
    <link rel="alternate" hreflang="x-default" href="http://example.com/page.html">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Scripts -->
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(71874106, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/71874106" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-9NHZGRY1DG"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-9NHZGRY1DG');
</script>

@stack("scripts")

</head>
<body>
@include("partials.video_player_modal")

@include('components.up_btn')

@include('components.up_banner')
<div id="app">

    @include("partials.navigation-menu")

    @yield('page')

    @include('partials.footer')

</div>
@include('components.tooltip')
@include('components.staff_image_slide')
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
