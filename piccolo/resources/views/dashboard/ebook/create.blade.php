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
                        <a href="{{ route('ebook.index') }}">
                            <button class="create-btn">
                                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> 
                                All Ebook
                            </button>
                        </a>
                    </div>
                    <div class="lg:w-1/3 mx-auto">
                        <form class="bg-white shadow-lg p-4" action="{{ route('ebook.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <h2 class="text-2xl text-center py-4 font-medium border-b-4 uppercase">Add Ebook</h2>
                            </div>
                            <div class="my-2">
                                <input type="text" name="name" value="{{old('name')}}" placeholder="Ebook Name" class="input-box @error('name') border-red-500 @enderror">
                                @error('name')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="my-2">
                                <input type="file" name="path" value="{{old('path')}}" class="input-box border-0 @error('path') border-red-500 @enderror">
                                @error('path')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="px-6 py-4 flex justify-end">
                                <button type="submit" class="btn-submit tracking-wider">Add Ebook</button>
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