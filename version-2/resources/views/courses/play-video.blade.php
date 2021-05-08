@extends('layouts.template')

@section('page-meta')
    <meta name="description" content="{{ $video->description }}">
    <meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap, Enroll, Computer Essentials, Web Development, Mobile Applicaation, Entrepreneur,Information Technology, Kano, Training">
@endsection

@section('page-title')
    {{ $video->name }} | Team Piccolo Global Enterprises
@endsection

@section('body-content')
    <!-- Play Video -->
    <div id="statsDiv" class="ml-2">
        <div class="text-2xl bg-white text-center border-b shadow py-2">
            @include('layouts.messages')
        </div>
        <div class="w-full lg:w-2/3 mx-auto shadow-lg py-4">
            <div class="bg-white mx-2 p-3">
                <div class="back-btn">
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
@endsection