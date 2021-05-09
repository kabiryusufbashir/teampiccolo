@extends('layouts.template')

@section('page-meta')
<meta name="description" content="login to access your courses on our Academy">
<meta name="keywords" content="Enroll, Computer Essentials, Web Development, Mobile Applicaation, Entrepreneur, Information Technology, Kano, Training">
@endsection

@section('page-title')
    Login | Team Piccolo Global Enterprises
@endsection

@section('header')
<div class="relative z-0 w-full h-screen">
    <div class="w-full flex justify-between leading-snug items-center h-screen">
        <div class="border-t-2 w-full lg:w-1/3 text-center px-6 lg:px-8 py-8 mx-auto shadow-lg">
            <img class="w-32 h-32 mx-auto" src="{{ asset('images/sign-in.png') }}" alt="Sign In">
            <form action="{{route('sign-in')}}" method="POST">
                @csrf
                <div>
                    <input required type="email" name="email" value="{{old('email')}}" placeholder="Email Address" class="input-box @error('name') border-red-500 @enderror">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <input required type="password" name="password" placeholder="Password" class="input-box @error('password') border-red-500 @enderror">
                    @error('password')
                        {{$message}}
                    @enderror
                </div>
                <div class="text-center mt-6">
                    <button class="btn-submit">Login</button>
                </div>
            </form>
            <div class="text-left mt-4 font-normal md:flex md:justify-between">
                <div>Don't have an Account? <a class="text-blue-600" href="{{ route('enroll') }}"> Register </a></div>
                <div><a class="text-blue-600" href="{{ route('enroll') }}"> Forgot Password? </a></div>
            </div>
        </div>
    </div>
</div>
@endsection