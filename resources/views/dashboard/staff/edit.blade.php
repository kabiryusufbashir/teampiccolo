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
        <!-- Stats -->
        <div id="statsDiv" class="col-span-4 ml-2">
            <div class="text-2xl bg-white text-center border-b shadow py-2">
                @include('layouts.messages')
            </div>
            <div class="md:grid md:grid-cols-4 md:gap-4">
                <div class="col-span-4 bg-white p-3">
                    <div class="flex justify-end">
                        <a href="{{ route('staff.index') }}">
                            <button class="create-btn">
                                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> 
                                All Staff
                            </button>
                        </a>
                    </div>
                    <div class="lg:w-1/3 mx-auto">
                        <form class="bg-white shadow-lg p-4" action="{{ route('staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                            <div>
                                <h2 class="text-2xl text-center py-4 font-medium border-b-4 uppercase">Edit Staff</h2>
                            </div>
                            <div class="my-2">
                                <img class="w-32 h-32 rounded-full p-2 mx-auto" src=" {{ $staff->photo }} " alt="{{ $staff->name }} Image">    
                            </div>
                            <div class="my-2">
                                <input type="text" value="{{ $staff->title }}" name="title" value="{{old('title')}}" placeholder="C.E.O Team Piccolo" class="input-box @error('name') border-red-500 @enderror">
                                @error('title')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <input type="text" value="{{ $staff->name }}" name="name" value="{{old('name')}}" placeholder="Staff Name" class="input-box @error('name') border-red-500 @enderror">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <input type="email" value="{{ $staff->email }}" name="email" value="{{old('email')}}" placeholder="Email Address" class="input-box @error('email') border-red-500 @enderror">
                                @error('email')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <input type="text" value="{{ $staff->phone_number }}" name="phone_number" value="{{old('phone_number')}}" placeholder="Phone Number" class="input-box @error('phone_number') border-red-500 @enderror">
                                @error('phone_number')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <select name="category" class="input-box @error('category') border-red-500 @enderror">
                                    <option value="{{ $staff->category }}">{{ $staffCategory }}</option>
                                    @if($staffCategory == 'Regular')
                                        <option value="1">Super User</option>
                                    @else
                                        <option value="2">Regular</option>
                                    @endif
                                </select>
                                @error('category')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <select name="status" class="input-box">
                                    <option value="{{ $staff->status }}">{{ $staffStatus }}</option>
                                    @if($staffStatus === 'Active')
                                        <option value="0">De-active</option>
                                    @else
                                        <option value="1">Active</option>
                                    @endif
                                </select>
                                @error('status')
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
                                <button type="submit" class="btn-submit tracking-wider">Update Staff</button>
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
</body>
</html>