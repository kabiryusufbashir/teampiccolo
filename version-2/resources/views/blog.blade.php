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
        <div class="lg:grid grid-cols-3 gap-16 lg:mx-24">
            <div class="col-span-2">
            @foreach($blogs as $blog)
                <a href="{{ route('blog.read', $blog->id) }}">
                    <div class="shadow p-10 m-4 hover:shadow-lg">
                        <img class="h-42 my-4 mx-auto" src="{{ $blog->photo }}" alt="{{ $blog->title }}">
                        <h3 class="paragraph-title">{{ $blog->title }}</h3>
                        <p class="paragraph">
                            {!! html_entity_decode(Str::limit($blog->content, 150, '...')) !!} <a class="text-blue-600" href="{{ route('blog.read', $blog->id) }}">Read more</a><br>
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
            </div>
            <div class="col-span-1 border-t-2 lg:border-t-0 my-auto">
                @foreach($staffs as $staff)
                <div class="lg:ml-auto shadow-lg p-6 m-6">
                    <img style="width:180px; height:180px;" class="my-4 mx-auto" src="{{ $staff->photo }}" alt="{{ $staff->name }}">
                    <h3 class="paragraph-title text-center">{{ $staff->name }}</h3>
                    <h3 class="text-center text-green-500">{{ $staff->title }}</h3>
                </div>
                @endforeach            
            </div>
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