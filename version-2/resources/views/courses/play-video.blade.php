<html lang="en">
<head>
    <title>{{ $video->name }} | Team Piccolo Global Enterprises</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $video->description }}">
    <meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap, Enroll, Computer Essentials, Web Development, Mobile Applicaation, Entrepreneur,Information Technology, Kano, Training">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="{{ asset('images/favicon.ico') }}" rel="icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div class="bg-gray-600">
        <div class="md:flex md:justify-between md:grid md:grid-cols-4 py-3">
            <!-- system details -->
            <div class="mx-3 flex items-center justify-between col-span-1">
                <img class="w-10" src="{{ $system_settings->photo ?? asset('images/logo.png') }}" alt="Logo">
                <h2 class="text-white ml-2 text-2xl">Team Piccolo Course Module</h2>
            </div>
            <!-- user details -->
            <div class="flex justify-center mt-4 md:mt-0 items-center md:justify-end col-span-3 mr-3">
                <!-- User Account  -->
                <div class="flex text-white items-center relative inline-block">
                    <span class="flex cursor-pointer" id="user_caret">
                        <!-- <svg class="w-6 h-6 text-white ml-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg> -->
                        <b class="relative top-1 font-normal">{{auth()->user()->name}}</b>
                        &nbsp;
                        <img class="w-10 h-10" src="{{ asset('images/yusuf.png') }}" alt="Logo">
                        <svg id="caret" class="w-5 h-5 my-auto" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>    
                    </span>
                    <div id="user_caret_menu" class="hidden absolute top-5 right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                        <div class="py-1 text-sm text-gray-700" aria-orientation="vertical">
                            <span class="user-setting-caret">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                                &nbsp;&nbsp;
                                <a href="#" class="">Edit profile</a>
                            </span>
                            <span class="user-setting-caret">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z"></path></svg>
                                &nbsp;&nbsp;
                                <a href="#" class="">Change Password</a>
                            </span>
                            <span class="user-setting-caret">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                                &nbsp;&nbsp;
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf 
                                    <button class="focus:outline-none focus:bg-gray-100 focus:text-gray-900" type="submit" name="logout">Logout</button>
                                </form>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Play Video -->
    <div id="statsDiv" class="ml-2">
        <div class="text-2xl bg-white text-center border-b shadow py-2">
            @include('layouts.messages')
        </div>
        <div class="w-full lg:w-2/3 mx-auto shadow-lg py-4">
            <div class="bg-white mx-2 p-3">
                <div class="flex justify-end">
                    <a href="{{ url()->previous() }}">
                        <button class="create-btn">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.445 14.832A1 1 0 0010 14v-2.798l5.445 3.63A1 1 0 0017 14V6a1 1 0 00-1.555-.832L10 8.798V6a1 1 0 00-1.555-.832l-6 4a1 1 0 000 1.664l6 4z"></path></svg>
                            Back
                        </button>
                    </a>
                </div>
                <div>
                    @if($video->count())
                    <div class="my-6 mx-3 text-3xl font-medium">
                        {{ $course->name }}
                    </div>
                    <div class="flex justify-center border-t-2 py-2">
                        <iframe class="w-full h-full md:h-96 md:w-3/4" src="{{ $video->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="lg:grid lg:grid-cols-2 md:gap-4 mx-2 my-6 border-green-600 py-4">
                        <div class="md:my-auto text-lg">
                            Name: <b>{{ $video->name }}</b> <br> 
                            Description: <b>{{ $video->description }}</b> 
                        </div>
                    </div>
                    
                    @else
                        <div class="bg-white text-2xl text-center py-2">
                            No Video Found
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/courses.js') }}"></script>
</body>
</html>