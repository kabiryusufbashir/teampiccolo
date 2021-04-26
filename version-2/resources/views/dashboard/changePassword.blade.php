<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    <!-- Nav  -->
    @include('includes.nav')

    <!-- #menu  -->
    <div class="md:grid md:grid-cols-5">
        <!-- Nav link  -->
        @include('includes.menu')
        <div id="statsDiv" class="col-span-4 ml-2">
            <div class="text-2xl bg-white text-center border-b shadow py-2">
                @include('layouts.messages')
            </div>
            <div class="md:grid md:grid-cols-4 md:gap-4">
                <div class="col-span-4 bg-white p-3">
                    <div class="flex justify-end">
                        <a href="{{ url()->previous() }}">
                            <button class="create-btn">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.445 14.832A1 1 0 0010 14v-2.798l5.445 3.63A1 1 0 0017 14V6a1 1 0 00-1.555-.832L10 8.798V6a1 1 0 00-1.555-.832l-6 4a1 1 0 000 1.664l6 4z"></path></svg>
                                Back
                            </button>
                        </a>
                    </div>
                    <div class="lg:w-2/4 mx-auto shadow-lg">
                        <form class="p-4" action="{{ route('admin.profile.passwordUpdate', $user->id) }}" method="POST" enctype="multipart/form-data">
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
    </div>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>