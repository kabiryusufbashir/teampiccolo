<html lang="en">
<head>
    <title>{{ $course->name }} | Team Piccolo Global Enterprises</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $course->description }}">
    <meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap, Enroll, Computer Essentials, Web Development, Mobile Applicaation, Entrepreneur,Information Technology, Kano, Training">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="{{ asset('images/favicon.ico') }}" rel="icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Nav  -->
    @include('layouts.courses-nav')

    <!-- Show Course -->
    <div id="statsDiv" class="ml-2">
        <div class="text-2xl bg-white text-center border-b shadow py-2">
            @include('layouts.messages')
        </div>
        <div class="w-full lg:w-4/5 mx-auto shadow-lg py-4">
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
                    @if($course->count())
                    <div class="my-6 mx-3 text-3xl font-medium">
                        {{ $course->name }}
                    </div>
                    <div class="grid grid-cols-2 md:gap-4 mx-2 my-6 border-b-2 border-green-600 py-4">
                        <div class="md:my-auto text-lg">
                            {{ $course->description }} <br>
                            <span class="font-medium">
                                @if($course->video->count() > 1)
                                    {{  $course->video->count() }} Videos
                                @else
                                    {{  $course->video->count() }} Video
                                @endif
                            </span>
                        </div>
                        <div class="flex justify-end">
                            <img class="w-32 h-32 md:w-48 md:h-48" src=" {{ $course->photo }}" alt=" {{ $course->name }} logo">
                        </div>
                        
                    </div>
                    <div class="md:grid md:grid-cols-3 md:gap-4 mx-2 my-6">
                        @foreach($course->video as $video)
                            <div class="card">
                                <div>
                                    <img class="w-full p-2 mx-auto border-2" src=" {{ $video->photo }} " alt="{{ $video->name }} Image">    
                                </div>
                                <div class="font-medium text-xl py-1 border-b mb-4">
                                    {{ $video->name }}
                                </div>
                                <div class="flex justify-center border-t pt-4 pb-2 items-center">
                                    <form action="{{ route('play.video', $video->id) }}">
                                        <button class="play-btn">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path></svg>
                                            &nbsp;&nbsp;
                                            <span> Play</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @else
                        <div class="bg-white text-2xl text-center py-2">
                            No Course Found
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/courses.js') }}"></script>
</body>
</html>