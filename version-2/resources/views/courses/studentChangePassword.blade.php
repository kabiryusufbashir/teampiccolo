@extends('layouts.template')

@section('page-meta')
    <meta name="description" content="Web Development Courses">
    <meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap, Enroll, Computer Essentials, Web Development, Mobile Applicaation, Entrepreneur,Information Technology, Kano, Training">
@endsection

@section('page-title')
    {{ auth()->user()->name }} | Team Piccolo Global Enterprises
@endsection

@section('body-content')
    <!-- Change Password -->
    <div id="statsDiv" class="ml-2">
        <div class="text-2xl bg-white text-center border-b shadow py-2">
            @include('layouts.messages')
        </div>
        <div class="w-full lg:w-1/3 mx-auto shadow-lg py-4">
            <div class="bg-white mx-2 p-3">
                <div class="back-btn">
                    <a href="{{ url()->previous() }}">
                        <button class="create-btn">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.445 14.832A1 1 0 0010 14v-2.798l5.445 3.63A1 1 0 0017 14V6a1 1 0 00-1.555-.832L10 8.798V6a1 1 0 00-1.555-.832l-6 4a1 1 0 000 1.664l6 4z"></path></svg>
                            Back
                        </button>
                    </a>
                </div>
                <div>
                    <form class="p-4" action="{{ route('student.profile.passwordUpdate', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                        <div>
                            <h2 class="text-2xl text-center py-4 font-medium border-b-4 uppercase">Change Password</h2>
                        </div>
                        <div class="my-2">
                            <input type="email" value="{{ $user->email }}" name="email" value="{{old('email')}}" placeholder="Email Address" class="input-box @error('email') border-red-500 @enderror">
                            @error('email')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="my-2">
                            <input type="password" name="old_password" placeholder="Old Password" class="input-box @error('old_number') border-red-500 @enderror">
                            @error('old_password')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="my-2">
                            <input type="password" name="password" placeholder="New Password" class="input-box @error('password') border-red-500 @enderror">
                            @error('password')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="my-2">
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="input-box @error('password_confirmation') border-red-500 @enderror">
                            @error('password_confirmation')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="px-6 py-4 flex justify-end">
                            <button type="submit" class="btn-submit tracking-wider">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection