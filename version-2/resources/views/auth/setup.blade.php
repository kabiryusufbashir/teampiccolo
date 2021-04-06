@extends('layouts.template')

@section('page-title')
    Set-Up | Team Piccolo Global Enterprises
@endsection

@section('header')
<div class="relative z-0 w-full h-screen">
    <div class="w-full flex justify-between leading-snug items-center h-screen">
        <div class="border-t-2 w-full lg:w-1/3 text-center px-6 lg:px-14 py-8 mx-auto shadow-lg">
            <img class="w-32 h-32 mx-auto" src="{{ asset('images/sign-in.png') }}" alt="Sign In">
            <form action="{{route('setup-system')}}" method="POST">
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
        </div>
    </div>
</div>
@endsection