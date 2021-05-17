@extends('layouts.template')

@section('page-meta')
<meta name="description" content="Want to learn about Programming? Visit our blog to get the latest talks on programming.">
<meta name="keywords" content="Writer, Blog, Entrepreneur, Information Technology, Kano, Training">
@endsection

@section('page-title')
    Blog | Team Piccolo Global Enterprises
@endsection

@section('body-content')
    <!-- Blog  -->
    @if($blogs->count())
        <div class="page-title">
            Team Piccolo Blog 
        </div>
        <div class="text-center text-green-600 text-2xl mb-3">
            Categories
            <svg class="mx-auto w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        </div>
        <div class="md:flex justify-center list-none mx-2 text-lg text-center">
            <li class="mx-4 text-green-600 hover:underline"><a href="#">Web Development</a></li>
            <li class="mx-4 text-green-600 hover:underline"><a href="#">Mobile Development</a></li>
            <li class="mx-4 text-green-600 hover:underline"><a href="#">Computer Application</a></li>
            <li class="mx-4 text-green-600 hover:underline"><a href="#">IT News</a></li>
        </div>
        @foreach($blogs as $blog)
            <a href="{{ route('blog.read', $blog->id) }}">
                <div class="shadow p-10 m-4 hover:shadow-lg md:mx-auto md:w-1/3">
                    <img class="h-42 my-4 mx-auto" src="{{ $blog->photo }}" alt="{{ $blog->title }}">
                    <h3 class="paragraph-title">{{ $blog->title }}</h3>
                    <p class="paragraph">
                        {!! html_entity_decode(Str::limit($blog->content, 150, '...')) !!}<br>
                        <div class="flex my-4 items-center justify-between">
                            <div class="flex items-center">
                                <img class="w-10 h-10" src="{{ \App\Models\Admin::where(['id' => $blog->author])->first()->photo ?? asset('/images/logo.png') }}" alt="{{ \App\Models\Admin::where(['id' => $blog->author])->first()->name }}"> 
                                &nbsp;&nbsp;
                                <span>{{ \App\Models\Admin::where(['id' => $blog->author])->first()->name }}</span>
                            </div>
                            <div>
                                {{ $blog->created_at->diffForhumans() }}
                            </div>
                        </div>
                        <span>Read: {{ $blog->views }}</span>
                    </p>
                </div>
            </a>
            
        @endforeach
    @else
        <div class="text-2xl lg:mx-32 px-4 my-6 relative top-10 my-24">
            No Blog Post found!
        </div>
    @endif
    <div class="my-6 mx-3">
        {{ $blogs->links() }}
    </div>
@endsection