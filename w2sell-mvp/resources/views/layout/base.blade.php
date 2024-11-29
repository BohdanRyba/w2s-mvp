<!doctype html>
<html class="no-js" lang="en">
<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="AgurSoft">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="description" content="@yield('meta_description', 'AgurSoft - Expert IT solutions for web development, e-commerce, and automation, serving Europe, the USA, and Israel. Let us elevate your business with our custom, full-stack expertise in Laravel, Django, Next.js, AWS, and more.')">
    <meta name="keywords" content="@yield('meta_keywords', 'AgurSoft, IT Solutions, Web Development, E-commerce, SaaS, Automation, AI, Laravel, Django, Next.js, AWS, Golang')">
    <meta name="robots" content="index, follow">
    <!-- favicon icon -->
    {{--    <link rel="shortcut icon" href="images/favicon.png">--}}
    {{--    <link rel="apple-touch-icon" href="images/apple-touch-icon-57x57.png">--}}
    {{--    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">--}}
    {{--    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">--}}

    <link rel="icon" type="image/png" href="{{asset('favicon/favicon-96x96.png')}}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{asset('favicon/favicon.svg')}}" />
    <link rel="shortcut icon" href="{{asset('favicon/favicon.ico')}}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png')}}" />
    <link rel="manifest" href="{{asset('favicon/site.webmanifest')}}" />

    <!-- google fonts preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- style sheets and font icons  -->
    <link rel="stylesheet" href="{{asset('css/vendors.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/icon.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}"/>
    <link rel="stylesheet" href="{{asset('demos/web-agency/web-agency.css')}}" />
    @stack('styles')
</head>
<body data-mobile-nav-style="classic" class="background-position-center-top" style="background-image: url(images/vertical-line-bg-small-medium-gray.svg)">
@include('includes.header')
@yield('content')
@include('includes.footer')
@include('components.subscription-popup')
@include('components.sticky')
@include('components.scroll-progress')

<!-- javascript libraries -->
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vendors.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
@stack('scripts')
</body>
</html>
