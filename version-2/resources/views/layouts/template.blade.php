<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('page-meta')
        <title>@yield('page-title')</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
        <link href="{{ asset('images/favicon.ico') }}" rel="icon">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    </head>
    <body>
        <!-- Navigation Bar -->
        <div class="z-40 flex justify-between lg:grid grid-cols-5 gap-3 bg-blue-500 py-4 shadow lg:px-32 px-4 items-center fixed w-full">
            <div class="lg:col-span-1">
                <img class="w-12" src="{{ asset('images/logo.png') }}" alt="Team Piccolo Logo">
            </div>
            <div class="lg:col-span-3 hidden lg:block">
                <nav class="lg:flex justify-between list-none text-white">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Publications</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact Us</a></li>
                </nav>
            </div>
            <div class="flex justify-end items-center lg:col-span-1 text-white">
                <span>Enrol Now</span>
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
            </div>
            <div id="menu" class="lg:hidden cursor-pointer">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </div>
        </div>
        <!-- Mobile Nav -->
        <div id="nav" class="z-30 hidden h-screen w-full bg-white pt-6 fixed">
            <div class="pb-4 shadow">
                <svg id="close" class="ml-auto mr-6 w-10 h-10 cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </div>
            <div class="list-none p-4 text-2xl border-t bg-gray-100">
                <li class="p-4">
                    <a href="#" class="flex items-center">
                        <span>
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        </span>
                        &nbsp;&nbsp;
                        <span>
                            Home
                        </span>
                    </a>
                </li>
                <li class="p-4">
                    <a href="#" class="flex items-center">
                        <span>
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path></svg>
                        </span>
                        &nbsp;&nbsp;
                        <span>
                            Courses
                        </span>
                    </a>
                </li>
                <li class="p-4">
                    <a href="#" class="flex items-center">
                        <span>
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>        
                        </span>
                        &nbsp;&nbsp;
                        <span>
                            About Us
                        </span>
                    </a>
                </li>
                <li class="p-4">
                    <a href="#" class="flex items-center">
                        <span>
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path></svg>
                        </span>
                        &nbsp;&nbsp;
                        <span>
                            Publications
                        </span>
                    </a>
                </li>
                <li class="p-4">
                    <a href="#" class="flex items-center">
                        <span>
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path></svg>
                        </span>
                        &nbsp;&nbsp;
                        <span>
                            Blog
                        </span>
                    </a>
                </li>
                <li class="p-4">
                    <a href="#" class="flex items-center">
                        <span>
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>    
                        </span>
                        &nbsp;&nbsp;
                        <span>
                            Contact Us
                        </span>
                    </a>
                </li>
            </div>
        </div>
        <!-- header  -->
        <div class="relative z-0">
            <img class="object-cover w-full h-screen" src="{{ asset('images/bg_2.jpg') }}" alt="Team Piccolo Header">
            <div class="lg:grid grid-cols-2 gap-6 w-full flex justify-between px-4 leading-snug absolute top-40 lg:top-48 text-white text-5xl items-center">
                <div id="slogan" class="text-center">
                    Have <br>
                    An Idea?<br>
                    Talk to Us Now
                    <img class="w-32 mx-auto slogan-logo" src="{{ asset('images/thinking.png') }}" alt="Thinking">
                </div>
                <div id="slogan" class="hidden lg:block text-center">
                    <img class="w-32 mx-auto slogan-logo" src="{{ asset('images/design-thinking.png') }}" alt="Inspiration">
                    Best <br>
                    Software Solutions,<br>
                    I.C.T training & Consultation
                </div>
            </div>
        </div>
        @yield('body-content')
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>