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
                        <a href="{{ url()->previous() }}">
                            <button class="create-btn">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.707 4.879A3 3 0 018.828 4H15a3 3 0 013 3v6a3 3 0 01-3 3H8.828a3 3 0 01-2.12-.879l-4.415-4.414a1 1 0 010-1.414l4.414-4.414zm4 2.414a1 1 0 00-1.414 1.414L10.586 10l-1.293 1.293a1 1 0 101.414 1.414L12 11.414l1.293 1.293a1 1 0 001.414-1.414L13.414 10l1.293-1.293a1 1 0 00-1.414-1.414L12 8.586l-1.293-1.293z" clip-rule="evenodd"></path></svg>
                             Back
                            </button>
                        </a>
                    </div>
                    <div>
                        @if($video->count())
                        <div class="my-6 mx-3 text-3xl font-medium">
                            {{ $course->name }}
                        </div>
                        <div class="grid grid-cols-2 md:gap-4 mx-2 my-6 border-b-2 border-green-600 py-4">
                            <div class="md:my-auto text-lg">
                                Name: <b>{{ $video->name }}</b> <br> 
                                Description: <b>{{ $video->description }}</b> 
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <iframe class="w-full h-full md:h-96 md:w-3/4" src="{{ $video->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
    </div>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>