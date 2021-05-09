@extends('layouts.template')

@section('page-meta')
<meta name="description" content="Want to learn about Programming? Visit our blog to get the latest talks on programming.">
<meta name="keywords" content="Writer, Blog, Entrepreneur, Information Technology, Kano, Training">
@endsection

@section('page-title')
    Server Error | Team Piccolo Global Enterprises
@endsection

@section('body-content')
    <!-- error  -->
    <div class="text-center text-green-600 text-3xl pt-24 pb-6 md:p-10 md:m-4 md:mx-auto md:w-1/3">
        <img class="w-48 mx-auto my-4" src="{{ asset('images/500.png') }}" alt="404 page">
        Unable to handle your request now... Please try again later 
    </div>
@endsection