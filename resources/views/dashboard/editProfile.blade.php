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
                        <form class="p-4" action="{{ route('admin.profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div>
                                <h2 class="text-2xl text-center py-4 font-medium border-b-4 uppercase">Edit Profile</h2>
                            </div>
                            <div class="my-2">
                                <img class="w-36 h-36 rounded-full p-2 mx-auto" src=" {{ $user->photo ?? asset('/images/logo.png') }} " alt="{{ $user->name }} Image">    
                            </div>
                            <div class="my-2">
                                <input disabled type="email" value="{{ $user->email }}" name="email" value="{{old('email')}}" placeholder="Email Address" class="input-box @error('email') border-red-500 @enderror">
                                @error('email')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <input type="text" value="{{ $user->name }}" name="name" value="{{old('name')}}" placeholder="Full Name" class="input-box @error('name') border-red-500 @enderror">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <input type="text" value="{{ $user->phone_number }}" name="phone_number" value="{{old('phone_number')}}" placeholder="Phone Number" class="input-box @error('phone_number') border-red-500 @enderror">
                                @error('phone_number')
                                    {{$message}}
                                @enderror
                            </div>
                            <div id="changePhoto" class="my-2 cursor-pointer text-xl underline text-blue-600">Change Photo</div>
                            <div id="changePhotoField" class="my-2 hidden">
                                <input type="file" name="photo" value="{{old('photo')}}" class="input-box border-0 @error('photo') border-red-500 @enderror">
                                @error('photo')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="px-6 py-4 flex justify-end">
                                <button type="submit" class="btn-submit tracking-wider">Update Profile</button>
                            </div>
                        </form>
                    </div>    
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        //Change Photo
        const changePhoto = document.querySelector("#changePhoto");
        const changePhotoField = document.querySelector("#changePhotoField");

        changePhoto.addEventListener('click', ()=>{
            if(changePhotoField.classList.contains('hidden')){
                changePhotoField.classList.remove('hidden');
            }else{
                changePhotoField.classList.add('hidden');
            }
        });
    </script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>