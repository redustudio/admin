<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>@yield('title')</title>
        <meta name="description" content="Your Description">

        <link rel="stylesheet" href="{{ asset('vendor/reduvel/admin/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/reduvel/admin/fa/css/font-awesome.min.css') }}">
        <link rel="canonical" href="{{ config('app.url') }}">

        @yield('style-head')
    </head>
    <body>
        @yield('body')

        <script src="{{ asset('vendor/reduvel/admin/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/reduvel/admin/tether.min.js') }}"></script>
        <script src="{{ asset('vendor/reduvel/admin/bootstrap/js/bootstrap.js') }}"></script>
        <script src="{{ asset('vendor/reduvel/admin/app.js') }}"></script>

        @yield('script-end')
    </body>
</html>
