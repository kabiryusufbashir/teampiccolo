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
                        <a href="{{ route('video.index') }}">
                            <button class="create-btn">
                                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> 
                                All Video
                            </button>
                        </a>
                    </div>
                    <div class="lg:w-1/2 mx-auto border-t-2">
                        <form class="bg-white shadow-lg p-4" action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <h2 class="text-2xl text-center py-4 font-medium border-b-4 uppercase">Add Video</h2>
                            </div>
                            <div class="my-2">
                                <span class="text-lg font-medium">Course Name</span>
                                <select name="course_id" class="input-box">
                                    <option value=""></option>
                                    @if($courses->count() > 0)
                                        @foreach($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    @elseif($courses->count() < 0)
                                        <option value="">No Course Found</option>
                                    @endif
                                </select>
                                @error('course_id')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <span class="text-lg font-medium">Video Name</span>
                                <input type="text" name="name" value="{{old('name')}}" placeholder="Video Name" class="input-box @error('name') border-red-500 @enderror">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <span class="text-lg font-medium">Video Url</span>
                                <input type="text" name="url" value="{{old('url')}}" placeholder="Video Url" class="input-box @error('url') border-red-500 @enderror">
                                @error('url')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <span class="text-lg font-medium">Video Slug</span>
                                <input type="text" name="slug" value="{{old('slug')}}" placeholder="Slug" class="input-box @error('slug') border-red-500 @enderror">
                                @error('slug')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <span class="text-lg font-medium">Video Description</span>
                                <textarea name="description" class="px-5 w-full border border-gray-400 h-24 rounded-lg my-2 text-lg focus:outline-none @error('description') border-red-500 @enderror"></textarea>
                                @error('description')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <span class="text-lg font-medium">Video Thumbnail</span>
                                <input type="file" name="photo" value="{{old('photo')}}" class="input-box border-0 @error('photo') border-red-500 @enderror">
                                @error('photo')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="px-6 py-4 flex justify-end">
                                <button type="submit" class="btn-submit tracking-wider">Add Video</button>
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