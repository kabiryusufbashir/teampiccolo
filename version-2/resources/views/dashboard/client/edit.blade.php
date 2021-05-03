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
                        <a href="{{ route('client.index') }}">
                            <button class="create-btn">
                                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> 
                                All Client
                            </button>
                        </a>
                    </div>
                    <div class="lg:w-1/3 mx-auto">
                        <form class="bg-white shadow-lg p-4" action="{{ route('client.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                            <div>
                                <h2 class="text-2xl text-center py-4 font-medium border-b-4 uppercase">Edit Client</h2>
                            </div>
                            <div class="my-2">
                                <img class="w-32 h-32 rounded-full p-2 mx-auto" src=" {{ $client->photo }} " alt="{{ $client->name }} Image">    
                            </div>
                            <div class="my-2">
                                <input type="text" name="name" value="{{ $client->name }}" placeholder="Client Name" class="input-box @error('name') border-red-500 @enderror">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <input type="email" name="email" value="{{ $client->email }}" placeholder="Email Address" class="input-box @error('email') border-red-500 @enderror">
                                @error('email')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <input type="text" name="phone_number" value="{{ $client->phone_number }}" placeholder="Phone Number" class="input-box @error('phone_number') border-red-500 @enderror">
                                @error('phone_number')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <input type="text" name="website" value="{{ $client->website }}" placeholder="Website" class="input-box @error('website') border-red-500 @enderror">
                                @error('website')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <input type="text" name="address" value="{{ $client->address }}" placeholder="Address" class="input-box @error('address') border-red-500 @enderror">
                                @error('address')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <input type="text" name="company" value="{{ $client->company }}" placeholder="Company" class="input-box @error('company') border-red-500 @enderror">
                                @error('company')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <textarea id="content" name="contract_description" class="px-5 w-full border border-gray-400 h-24 rounded-lg my-2 text-lg focus:outline-none @error('contract_description') border-red-500 @enderror" placeholder="Contract Description">{{  $client->contract_description }}</textarea>
                                @error('contract_description')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <span class="input-title">Date Signed</span>
                                <input type="date" name="date_signed" value="{{ $client->date_signed }}" placeholder="Date Signed" class="input-box @error('date_signed') border-red-500 @enderror">
                                @error('date_signed')
                                    {{$message}}
                                @enderror
                            </div>
                            <div id="changePhoto" class="my-2 cursor-pointer text-xl underline text-blue-600">Change Logo</div>
                            <div id="changePhotoField" class="my-2 hidden">
                                <input type="file" name="photo" value="{{old('photo')}}" class="input-box border-0 @error('photo') border-red-500 @enderror">
                                @error('photo')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="px-6 py-4 flex justify-end">
                                <button type="submit" class="btn-submit tracking-wider">Update client</button>
                            </div>
                        </form>
                    </div>    
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch( error => {
                console.error( error );
            } );
    </script>
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