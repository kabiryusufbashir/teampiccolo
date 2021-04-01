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
        <div class="text-center px-8 my-auto">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div>
                    <input required type="text" name="name" value="{{old('name')}}" placeholder="Full Name" class="px-5 w-full border border-gray-400 h-12 rounded-lg my-2 text-lg focus:outline-none @error('email') border-red-500 @enderror">
                    @error('name')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <input required type="email" name="email" value="{{old('email')}}" placeholder="Email Address" class="px-5 w-full border border-gray-400 h-12 rounded-lg my-2 text-lg focus:outline-none @error('name') border-red-500 @enderror">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <input required type="text" name="phone_number" value="{{old('phone_number')}}" placeholder="Phone No" class="px-5 w-full border border-gray-400 h-12 rounded-lg my-2 text-lg focus:outline-none @error('phone_number') border-red-500 @enderror">
                    @error('phone_number')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <input required type="password" name="password" placeholder="Password" class="px-5 w-full border border-gray-400 h-12 rounded-lg my-2 text-lg focus:outline-none @error('password') border-red-500 @enderror">
                    @error('password')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <input required type="password" name="password_confirmation" placeholder="Confirm Password" class="px-5 w-full border border-gray-400 h-12 rounded-lg my-2 text-lg focus:outline-none @error('password_confirmation') border-red-500 @enderror">
                    @error('password_confirmation')
                        {{$message}}
                    @enderror
                </div>
                <div class="text-center mt-6">
                    <button class="bg-green-600 py-2 text-white rounded-full uppercase w-full h-12 focus:outline-none">Create Account</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection