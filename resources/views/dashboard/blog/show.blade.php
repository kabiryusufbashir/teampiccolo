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
            <div class="">
                <div class="bg-white mx-2 p-3">
                    <div class="flex justify-end">
                        <a href="{{ route('blog.index') }}">
                            <button class="create-btn">
                                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> 
                                All Blog
                            </button>
                        </a>
                    </div>
                    <div>
                        @if($blog->count())
                            <div class="shadow-lg p-4 lg:w-3/4 lg:mx-auto">
                                <div class="my-6 mx-3 text-3xl font-medium">
                                    {{ $blog->title }} <br>
                                    <span class="font-normal text-sm">By {{ \App\Models\Admin::where(['id' => $blog->author])->first()->name }}</span>
                                </div>
                                <div class="my-6 mx-3 text-3xl font-medium">
                                    <img class="w-full md:w-full mx-auto" src=" {{ $blog->photo }}" alt=" {{ $blog->name }} logo">
                                </div>
                                <div class="md:my-auto text-lg">
                                    {!! html_entity_decode($blog->content) !!} <br>
                                </div>
                            </div>
                        @else
                            <div class="bg-white text-2xl text-center py-2">
                                No Blog Found
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>