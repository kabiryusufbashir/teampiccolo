@extends('layouts.template')

@section('page-meta')
<meta name="description" content="Enroll to our Academy to have access to our free courses on Computer Essentials, Web Development and Mobile Application">
<meta name="keywords" content="Enroll, Computer Essentials, Web Development, Mobile Applicaation, Entrepreneur,Information Technology, Kano, Training">
@endsection

@section('page-title')
    Contact | Team Piccolo Global Enterprises
@endsection

@section('header')
<div class="py-8">
    <div class="grid grid-cols-1 lg:grid lg:grid-cols-2 gap-8 lg:mx-32 px-4 py-6 pt-24">
        <div class="shadow-lg p-6">
            <span class="border-b-4 border-green-600 text-2xl">For Any Enquiries</span>
            <form action="{{route('contact')}}" method="POST" class="mt-4">
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
                    <textarea required name="enquiry" class="px-5 w-full border border-gray-400 h-24 rounded-lg my-2 text-lg focus:outline-none @error('password') border-red-500 @enderror" placeholder="Message"> </textarea>
                    @error('message')
                        {{$message}}
                    @enderror
                </div>
                <div class="text-center mt-6">
                    <button class="btn-submit">Submit</button>
                </div>
            </form>
        </div>
        <div>
            <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1380.029350253521!2d8.604651825840886!3d11.952856080372493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x11ae8265683aac83%3A0xd477b851b4bad822!2sIbrahim%20Kunya%20Housing%20Estate!5e0!3m2!1sen!2sng!4v1569176345363!5m2!1sen!2sng" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
            <div class="py-4">
                <div class="py-1 text-green-600">
                    <i class="fas fa-phone text-green-600"></i> 
                    <span>
                        <a class="" href="tel:+2348068593127">
                            08068593127
                        </a>
                        ,
                        <a class="text-green-600" href="tel:+2348032338280">
                            08032338280
                        </a>
                    </span>
                </div>
                <div class="py-1">
                    <i class="fas fa-envelope-square text-green-600"></i>
                    <span>
                        <a class="text-green-600" href="mailto:info@teampiccolo.com">
                           info@teampiccolo.com
                        </a>
                    </span>
                </div>
                <div class="py-1">
                    <a>
                        <i class="fas fa-home text-green-600"></i> 
                        <a href="#" class="text-green-600">No 7 Kabiru Alhaji Bashir Street off Maiduguri Road Kano State, Nigeria</a>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection