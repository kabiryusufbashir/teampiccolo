@extends('layouts.template')

@section('page-meta')
<meta name="description" content="Want to learn about Programming? Visit our blog to get the latest talks on programming.">
<meta name="keywords" content="Writer, Blog, Entrepreneur, Information Technology, Kano, Training">
@endsection

@section('page-title')
    Blog | Team Piccolo Global Enterprises
@endsection

@section('header')
<div class="relative z-0">
    <img class="object-cover w-full h-screen" src="{{ asset('images/bg_2.jpg') }}" alt="Team Piccolo Header">
    <div class="w-full flex justify-center px-4 leading-snug absolute top-40 lg:top-48 text-white text-5xl items-center">
        <div id="slogan" class="text-center">
            Team
            Piccolo<br>
            Blog Post
            <img class="w-32 mx-auto slogan-logo" src="{{ asset('images/writing.png') }}" alt="Writing">
        </div>
    </div>
</div>
@endsection

@section('body-content')
    <!-- Blog  -->
    @if($blogs->count())
        <div class="lg:grid grid-cols-3 gap-8 lg:mx-32 px-4 my-6 my-12">
            @foreach($blogs as $blog)
                <div class="shadow-lg p-6 mt-4">
                    <h3 class="paragraph-title">{{ $blog->title }}</h3>
                    <img style="width:180px; height:180px;" class="my-4 mx-auto" src="{{ $blog->photo }}" alt="{{ $blog->title }}">
                    <p class="paragraph">
                        <!-- {!! html_entity_decode(substr($blog->content, 0, 100)) !!}<br> -->
                        {!! html_entity_decode(Str::limit($blog->content, 150, '...')) !!} <a class="text-blue-600" href="{{ route('blog.read', $blog->id) }}">Read more</a><br>
                        <b>By {{ \App\Models\Admin::where(['id' => $blog->author])->first()->name }}</b><br>
                        <span>Read: {{ $blog->views }}</span>
                    </p>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-2xl lg:mx-32 px-4 my-6 relative top-10 my-24">
            No Blog Post found!
        </div>
    @endif
    <div class="my-6 mx-3">
        {{ $blogs->links() }}
    </div>
@endsection