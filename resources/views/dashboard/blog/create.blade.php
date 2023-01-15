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
                        <a href="{{ route('blog.index') }}">
                            <button class="create-btn">
                                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> 
                                All Blog
                            </button>
                        </a>
                    </div>
                    <div class="lg:w-3/4 mx-auto">
                        <form class="bg-white shadow-lg p-4" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <h2 class="text-2xl text-center py-4 font-medium border-b-4 uppercase">Add blog</h2>
                            </div>
                            <div class="my-2">
                                <input style="display:none;" type="text" name="author" value="{{ auth()->user()->id }}">
                                <input type="text" name="title" value="{{old('title')}}" placeholder="Blog Title" class="input-box @error('title') border-red-500 @enderror">
                                @error('title')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <input type="text" name="caption" value="{{old('caption')}}" placeholder="Blog Caption" class="input-box @error('caption') border-red-500 @enderror">
                                @error('caption')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <span class="input-title">Blog Photo</span>
                                <input type="file" name="photo" value="{{old('photo')}}" class="input-box border-0 @error('photo') border-red-500 @enderror">
                                @error('photo')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <textarea id="content" name="content" class="ckeditor px-5 w-full border border-gray-400 h-24 rounded-lg my-2 text-lg focus:outline-none @error('content') border-red-500 @enderror" placeholder="Description"></textarea>
                                @error('content')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <span class="input-title">Category</span>
                                <select name="category" value="{{old('category')}}" class="input-box @error('category') border-red-500 @enderror">
                                    <option value=""></option>
                                    <option value="Web Development">Web Development</option>
                                    <option value="Mobile Development">Mobile Development</option>
                                    <option value="Computer Application">Computer Application</option>
                                    <option value="IT News">I.T News</option>
                                </select>
                                @error('category')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <span class="input-title">Status</span>
                                <select name="status" value="{{old('status')}}" class="input-box @error('status') border-red-500 @enderror">
                                    <option value=""></option>
                                    <option value="Publish">Publish</option>
                                    <option value="Save as Draft">Save as Draft</option>
                                </select>
                                @error('status')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="px-6 py-4 flex justify-end">
                                <button type="submit" class="btn-submit tracking-wider">Add Blog</button>
                            </div>
                        </form>
                    </div>    
                </div>
            </div>
        </div>
    </div>
    
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    
    <script type="text/javascript">
        const viewFile = document.querySelector('.ckeditor');
            window.onload = function(){
                viewFile.ckeditor();
            }
    </script>

    <script type="text/javascript">
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>

    <script src="{{ asset('js/dashboard.js') }}"></script>

</body>
</html>