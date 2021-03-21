<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('page-meta')
        <title>@yield('page-title')</title>
        <link href="{{ asset('images/favicon.ico') }}" rel="icon">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    </head>
    <body>
        <!-- Navigation Bar -->
        <div class="flex justify-between lg:grid grid-cols-5 gap-3 bg-white py-4 shadow lg:px-8 px-4 items-center fixed w-full">
            <div class="lg:col-span-1">
                <img class="w-12" src="{{ asset('images/logo.png') }}" alt="Team Piccolo Logo">
            </div>
            <div class="lg:col-span-3 hidden lg:block">
                <nav class="lg:flex justify-between list-none">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Publications</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact Us</a></li>
                </nav>
            </div>
            <div class="flex justify-end items-center lg:col-span-1">
                <span>Enrol Now</span>
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
            </div>
            <div id="menu" class="lg:hidden cursor-pointer">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </div>
        </div>
        <div id="nav" class="hidden h-screen relative bg-white pt-6">
            <div class="float-right mr-4">
                <svg id="close" class="w-10 h-10 cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </div>
            <nav class="list-none p-6 text-2xl">
                <li class="p-6"><a href="#">Home</a></li>
                <li class="p-6"><a href="#">Courses</a></li>
                <li class="p-6"><a href="#">About Us</a></li>
                <li class="p-6"><a href="#">Publications</a></li>
                <li class="p-6"><a href="#">Blog</a></li>
                <li class="p-6"><a href="#">Contact Us</a></li>
            </nav>
        </div>
        <!-- header  -->
        <div>
            <img class="object-cover w-full h-screen" src="{{ asset('images/bg_2.jpg') }}" alt="Team Piccolo Header">
        </div>
        @yield('body-content')
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>