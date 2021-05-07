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
                        <a href="{{ route('weeklyletter.index') }}">
                            <button class="create-btn">
                                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> 
                                All Weekly Letter
                            </button>
                        </a>
                    </div>
                    <div class="lg:w-3/4 mx-auto">
                        <form class="bg-white shadow-lg p-4" action="{{ route('weeklyletter.update', $weeklyletter->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                            <div>
                                <h2 class="text-2xl text-center py-4 font-medium border-b-4 uppercase">Edit weeklyletter</h2>
                            </div>
                            <div class="my-2">
                                <input type="text" value="{{ $weeklyletter->title }}" name="title" value="{{old('title')}}" placeholder="weeklyletter Title" class="input-box @error('title') border-red-500 @enderror">
                                @error('title')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <textarea id="content" name="content" class="px-5 w-full border border-gray-400 h-24 rounded-lg my-2 text-lg focus:outline-none @error('content') border-red-500 @enderror">{{ $weeklyletter->content }}</textarea>
                                @error('content')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <select name="status" class="input-box">
                                    <option value="{{ $weeklyletter->status }}">{{ $weeklyletter->status }}</option>
                                    @if($weeklyletter->status === 'Publish')
                                        <option value="Save As Draft">Save As Draft</option>
                                    @else
                                        <option value="Publish">Publish</option>
                                    @endif
                                </select>
                                @error('status')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="px-6 py-4 flex justify-end">
                                <button type="submit" class="btn-submit tracking-wider">Update Weeklyletter</button>
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
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>ß