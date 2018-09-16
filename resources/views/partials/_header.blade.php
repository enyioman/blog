<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <!--// meta-->
        
        <title>{{ config('app.name') }} @yield('title')</title>
        
        <!-- // styles -->
        @yield('stylesheet')
    </head>
    <body>
        <div class="flex-center position-ref full-height">