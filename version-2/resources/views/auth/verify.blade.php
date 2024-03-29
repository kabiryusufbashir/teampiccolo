@extends('layouts.template')

@section('page-meta')
<meta name="description" content="Verify your phone number">
<meta name="keywords" content="Enroll, Computer Essentials, Web Development, Mobile Applicaation, Entrepreneur,Information Technology, Kano, Training">
@endsection

@section('page-title')
    Verify Phone Number | Team Piccolo Global Enterprises
@endsection

@section('header')
<div class="relative z-0 w-full py-24 md:py-0">
    <div class="lg:grid grid-cols-2 w-full flex justify-between leading-snug items-center">
        <div class="hidden lg:block text-center bg-green-600 relative h-screen">
            <img class="w-full object-cover mx-auto w-full h-screen" src="{{ asset('images/verify.jpg') }}" alt="verify account">
        </div>
        <div class="px-8">
            <div class="lg:mx-32 text-3xl mb-8">
                <span class="border-b-4 border-green-600 tracking-wider">Verify your Phone Number</span>
            </div>
            <div class="mb-2">
                Please enter the OTP sent to your number: {{session('phone_number')}}
            </div> 
            <form class="text-left" action="{{ route('verify') }} " method="POST">
                @csrf
                <div>
                    <div>
                        <input type="hidden" name="name" value="{{session('name')}}">
                        <input type="hidden" name="email" value="{{session('email')}}">
                        <input type="hidden" name="phone_number" value="{{session('phone_number')}}">
                        <input type="hidden" name="password" value="{{session('password')}}">
                        <input placeholder="Please enter the OTP sent to your number" id="verification_code" type="tel" class="input-box @error('verification_code') is-invalid @enderror" name="verification_code" value="{{ old('verification_code') }}" required>
                        @error('verification_code')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="text-center mt-6">
                    <button type="submit" class="btn-submit">
                        {{ __('Verify Phone Number') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection