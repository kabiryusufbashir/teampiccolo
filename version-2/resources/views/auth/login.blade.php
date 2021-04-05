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
    <div class="lg:grid grid-cols-2 w-full flex justify-between leading-snug items-center">
        <div class="text-center px-8 my-auto">
            <div class="lg:mx-32 px-4 text-3xl mb-8">
                <span class="border-b-4 border-gray-200">Login to your Account</span>
            </div>
            <form action="{{route('register')}}" method="POST">
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
            <div class="text-left mt-4 font-medium text-lg">
                Don't have an Account? <a class="text-yellow-600" href="{{ route('enroll') }}"> Register </a>
            </div>
        </div>
        <div class="hidden lg:block text-center bg-green-600 relative h-screen">
            <img class="w-full object-cover mx-auto w-full h-screen" src="{{ asset('images/sign-in.png') }}" alt="Sign In">
        </div>
    </div>
</div>
@endsection