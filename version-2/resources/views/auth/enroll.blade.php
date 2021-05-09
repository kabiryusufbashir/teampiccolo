@extends('layouts.template')

@section('page-meta')
<meta name="description" content="Enroll to our Academy to have access to our free courses on Computer Essentials, Web Development and Mobile Application">
<meta name="keywords" content="Enroll, Computer Essentials, Web Development, Mobile Applicaation, Entrepreneur,Information Technology, Kano, Training">
@endsection

@section('page-title')
    Enroll | Team Piccolo Global Enterprises
@endsection

@section('header')
<div class="relative z-0 w-full h-screen">
    <div class="lg:grid grid-cols-2 w-full flex justify-between leading-snug items-center">
        <div class="hidden lg:block text-center bg-green-600 relative h-screen">
            <img class="w-full object-cover mx-auto w-full h-screen" src="{{ asset('images/enroll.jpg') }}" alt="Enrollment">
        </div>
        <div class="text-center px-4 lg:px-8 my-auto mt-24 w-full">
            <div class="lg:mx-32 px-4 text-3xl mb-8">
                <span class="border-b-4 border-gray-200">Create an Account</span>
            </div>
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div>
                    <input required type="text" name="name" value="{{old('name')}}" placeholder="Full Name" class="input-box @error('email') border-red-500 @enderror">
                    @error('name')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <input required type="email" name="email" value="{{old('email')}}" placeholder="Email Address" class="input-box @error('name') border-red-500 @enderror">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <input required type="text" name="phone_number" value="{{old('phone_number')}}" placeholder="Phone No (e.g +2348000000000)" class="input-box @error('phone_number') border-red-500 @enderror">
                    @error('phone_number')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <input required type="password" name="password" placeholder="Password" class="input-box @error('password') border-red-500 @enderror">
                    @error('password')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <input required type="password" name="password_confirmation" placeholder="Confirm Password" class="input-box @error('password_confirmation') border-red-500 @enderror">
                    @error('password_confirmation')
                        {{$message}}
                    @enderror
                </div>
                <div class="text-center mt-6">
                    <button class="btn-submit">Create Account</button>
                </div>
            </form>
            <div class="text-left mt-4 font-normal text-lg">
                Already have an account? <a class="text-blue-600 hover:underline tracking-wider" href="{{ route('login') }}"> Login </a>
            </div>
        </div>
    </div>
</div>
@endsection