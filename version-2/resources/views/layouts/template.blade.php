<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('page-title')</title>
        <link href="{{ asset('images/favicon.ico') }}" rel="icon">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <!-- Navigation Bar -->
        <div class="bg-white py-4 shadow">
            <div>
                <img class="w-12" src="{{ asset('images/logo.png') }}" alt="Team Piccolo Logo">
            </div>
            <div>
                
            </div>
        </div>
        @yield('body-content')
    </body>
</html>