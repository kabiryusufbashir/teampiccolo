<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    <!-- Nav  -->
    @include('includes.nav')

    <!-- #menu  -->
    <div class="md:grid md:grid-cols-5">
        <!-- Nav link  -->
        @include('includes.menu')
        <!-- Stats -->
        <div id="statsDiv" class="col-span-4 ml-2">
            <div class="text-2xl bg-white text-center border-b shadow py-2">
                @include('layouts.messages')
            </div>
            <div class="md:grid md:grid-cols-4 md:gap-4">
                <div class="col-span-4 bg-white mx-2 p-3">
                    <div class="flex justify-end">
                        <a href="{{ route('course.index') }}">
                            <button class="create-btn">
                                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> 
                                All Course
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
                                    <form action="{{ route('course.play.video', $video->id) }}">
                                        <button class="view-btn">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                            <span> Play</span>
                                        </button>
                                    </form>
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
    </div>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>