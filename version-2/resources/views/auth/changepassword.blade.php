@extends('layouts.template')

@section('page-meta')
<meta name="description" content="login to access your courses on our Academy">
<meta name="keywords" content="Enroll, Computer Essentials, Web Development, Mobile Applicaation, Entrepreneur, Information Technology, Kano, Training">
@endsection

@section('page-title')
    Change Password | Team Piccolo Global Enterprises
@endsection

@section('header')
<div class="relative z-0 w-full h-screen">
    <div class="w-full flex justify-between leading-snug items-center h-screen">
        <div class="border-t-2 w-full lg:w-1/3 px-6 lg:px-8 py-8 mx-auto shadow-lg">
            <img class="w-32 h-32 mx-auto" src="{{ asset('images/sign-in.png') }}" alt="Sign In">
            <form action="{{route('forgot.password.check.number')}}" method="POST">
                @csrf
                <div>
                    <span class="input-title">Enter your Phone Number</span>
                    <input required type="text" name="phone_number" value="{{old('phone_number')}}" placeholder="+2348068593127" class="input-box @error('phone_number') border-red-500 @enderror">
                    @error('phone_number')
                        {{$message}}
                    @enderror
                </div>
                <div class="text-center mt-6">
                    <button class="btn-submit">Confirm Number</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection