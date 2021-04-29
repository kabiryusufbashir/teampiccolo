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
        <div class="my-24 w-full px-6">
            <div>
                <img class="mx-auto w-48" src="{{ $blog->photo }}" alt="{{ $blog->title }}">
            </div>
            <div class="text-3xl mb-8">
                <span class="border-b-4 border-green-600">{{ $blog->title }}</span>
            </div>
            <p class="paragraph">
                {!!  html_entity_decode($blog->content) !!}
            </p>
            <p class="my-6">
                <b>By {{ \App\Models\Admin::where(['id' => $blog->author])->first()->name }}</b><br>
                <span>View: {{ $blog->views }}</span>
            </p>
            <p>
                <div class="flex justify-end">
                    <a href="{{ url()->previous() }}">
                        <button class="create-btn" style="width:120%; height:120%;">
                            <img class="w-6" src="{{ asset('images/back-arrow.png') }}" alt="">
                            &nbsp;&nbsp;
                            Back
                        </button>
                    </a>
                </div>
            </p>
        </div>
    </div>
</div>
@endsection