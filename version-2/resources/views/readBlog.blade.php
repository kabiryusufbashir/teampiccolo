@extends('layouts.template')

@section('page-meta')
<meta name="description" content="{!! html_entity_decode($blog->content) !!}">
<meta name="keywords" content="About, Piccolo, Team, Enroll, Computer Essentials, Web Development, Mobile Applicaation, Entrepreneur,Information Technology, Kano, Training">
@endsection

@section('page-title')
    {{ $blog->title }} | Team Piccolo Global Enterprises
@endsection

@section('header')
<div class="relative z-0 w-full">
    <div class="w-full lg:w-2/3 mx-auto leading-snug items-center">
        <div class="px-8 py-24 shadow">
            <div>
                <img class="mx-auto h-32" src="{{ $blog->photo }}" alt="{{ $blog->title }}">
            </div>
            <div class="text-3xl mb-8">
                <span class="border-b-2 border-green-600">{{ $blog->title }}</span>
            </div>
            <p class="paragraph">
                {!!  html_entity_decode($blog->content) !!}
            </p>
            <p class="my-6">
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
                <span>View: {{ $blog->views }}</span>
            </p>
            <p>
                <div class="back-btn">
                    <a href="{{ url()->previous() }}">
                        <button class="create-btn" style="width:120%; height:120%;">
                            <img class="w-6 text-white" src="{{ asset('images/back-arrow.png') }}" alt="">
                            &nbsp;&nbsp;
                            Back
                        </button>
                    </a>
                </div>
            </p>
        </div>
    </div>
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-609aa74f316872e9"></script>
@endsection