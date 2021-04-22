<html lang="en">
<head>
    <title>Courses | Team Piccolo Global Enterprises</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Web Development Courses">
    <meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap, Enroll, Computer Essentials, Web Development, Mobile Applicaation, Entrepreneur,Information Technology, Kano, Training">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="{{ asset('images/favicon.ico') }}" rel="icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
@include('layouts.courses-nav')
    <div class="mx-3 my-6">
        <div class="text-2xl bg-white text-center border-b shadow py-2">
            @include('layouts.messages')
        </div>
        <div class="text-3xl mb-8">
            <span class="border-b-4 border-green-600">Courses</span>
        </div>
        @if($courses->count() > 0)
            <div class="my-6 mx-3">
                {{ $courses->links() }}
            </div>
            <div class="md:grid md:grid-cols-4 md:gap-4">
                <!-- Courses  -->
                @foreach($courses as $course)
                    <a href="{{ route('show.course', $course->id) }}">
                        <div class="stats-card">
                            <div>
                                <img class="w-24 p-2" src="{{ $course->photo }}" alt="{{ $course->name }} Icon">
                            </div>
                            <div>
                                <div class="text-right text-xl font-medium">Videos: {{ $course->video->count() }}</div>
                                <div class="text-dark px-4 py-1 rounded-lg flex items-center">
                                    <span>{{ $course->name }}</span>
                                </div>    
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="stats-card">
                <div>
                    <img class="stats-icon" src="{{ asset('images/logo.png') }}" alt="Logo Icon">
                </div>
                <div>
                    <div class="bg-blue-400 text-white px-4 py-1 rounded-lg flex items-center">
                        <span>Team Piccolo Course Module</span>
                    </div>    
                </div>
            </div>
        @endif
    </div>
    <div class="mt-6 border-t-2">
        <div class="mx-3 my-4 text-3xl mb-8">
            <span class="border-b-4 border-green-600">All Videos</span>
        </div>
        @if($videos->count())
        <div class="md:grid md:grid-cols-5 md:gap-4 mx-2 my-6">
            @foreach($videos as $video)
                <div class="card border-2">
                    <div>
                        <img class="w-full p-2 mx-auto border-2" src=" {{ $video->photo }} " alt="{{ $video->name }} Image">    
                    </div>
                    <div class="font-medium text-xl py-1 border-b">
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
        <div class="my-6 mx-3">
            {{ $videos->links() }}
        </div>
        @else
            <div class="bg-white text-2xl text-center py-2">
                No Video Found
            </div>
        @endif
    </div>
    <script src="{{ asset('js/courses.js') }}"></script>
</body>
</html>