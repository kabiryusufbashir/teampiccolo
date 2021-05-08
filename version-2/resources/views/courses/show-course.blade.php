@extends('layouts.template')

@section('page-meta')
    <meta name="description" content="Web Development Courses">
    <meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap, Enroll, Computer Essentials, Web Development, Mobile Applicaation, Entrepreneur,Information Technology, Kano, Training">
@endsection

@section('page-title')
    Courses | Team Piccolo Global Enterprises
@endsection

@section('body-content')
@if($courses->count())
        <div class="page-title">
            Team Piccolo Course 
        </div>
        <div class="md:grid md:grid-cols-2 md:gap-4 md:gap-16 md:mx-24">
            @foreach($courses as $course)
                <a href="{{ route('show.course', $course->id) }}">
                    <div class="stats-card hover:shadow-lg text-green-600 hover:bg-green-600 hover:text-white">
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
        <div class="text-2xl lg:mx-32 px-4 my-6 relative top-10 my-24">
            No Course found!
        </div>
    @endif
    <div class="my-6 mx-3">
        {{ $courses->links() }}
    </div>
@endsection