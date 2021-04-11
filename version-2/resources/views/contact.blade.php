@extends('layouts.template')

@section('page-meta')
<meta name="description" content="Enroll to our Academy to have access to our free courses on Computer Essentials, Web Development and Mobile Application">
<meta name="keywords" content="Enroll, Computer Essentials, Web Development, Mobile Applicaation, Entrepreneur,Information Technology, Kano, Training">
@endsection

@section('page-title')
    Contact | Team Piccolo Global Enterprises
@endsection

@section('header')
<div class="relative z-0 w-full h-screen">
    <div class="lg:grid grid-cols-2 w-full flex justify-between leading-snug items-center">
        <div class="hidden lg:block text-center bg-green-600 relative h-screen shadow-lg">
            <img class="w-full object-cover mx-auto w-full h-screen" src="{{ asset('images/contact-us.jpg') }}" alt="Contact Us">
        </div>
        <div class="px-4 lg:px-8 my-auto mt-24 w-full">
            <div class="mx-10 lg:mx-2 text-3xl mb-8">
                <span class="border-b-4 border-green-600 ">For Any Enquiries, Contact Us Below</span>
            </div>
            <form action="{{route('contact')}}" method="POST">
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
                    <input required type="text" name="phone" value="{{old('phone')}}" placeholder="Phone No (e.g 08000000000)" class="input-box @error('phone') border-red-500 @enderror">
                    @error('phone')
                        {{$message}}
                    @enderror
                </div>
                <div>
                    <textarea required name="message" class="px-5 w-full border border-gray-400 h-24 rounded-lg my-2 text-lg focus:outline-none @error('password') border-red-500 @enderror" placeholder="Message"> </textarea>
                    @error('message')
                        {{$message}}
                    @enderror
                </div>
                <div class="text-center mt-6">
                    <button class="btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection