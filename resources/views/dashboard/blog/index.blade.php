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
                <div class="col-span-4 bg-white mx-2 p-3">
                    <div class="flex justify-end">
                        <a href="{{ route('blog.create') }}">
                            <button class="create-btn">
                                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> 
                                Add Blog
                            </button>
                        </a>
                    </div>
                    <div>
                        @if($blogs->count())
                        <div class="my-6 mx-3">
                            {{ $blogs->links() }}
                        </div>
                        <div class="md:grid md:grid-cols-3 md:gap-4 mx-2 my-6">
                            @foreach($blogs as $blog)
                                <div class="card">
                                    <div>
                                        <img class="p-2 mx-auto w-64" src=" {{ $blog->photo }} " alt="{{ $blog->name }} Image">    
                                    </div>
                                    <div class="font-medium text-xl py-1">
                                        {{ $blog->title }} <br>
                                        <span class="font-normal text-lg">By {{ \App\Models\Admin::where(['id' => $blog->author])->first()->name }}</span>
                                    </div>
                                    <div class="btn-layout-control">
                                        <form action="{{ route('blog.show', $blog->id) }}">
                                            <button class="view-btn">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                                <span> Read</span>
                                            </button>
                                        </form>
                                        &nbsp;
                                        <form action="{{ route('blog.edit', $blog->id) }}" >
                                            @csrf 
                                            <button class="edit-btn">
                                                <span><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg></span>
                                                <span>Edit</span>
                                            </button>
                                        </form>
                                        &nbsp;
                                        <form action="{{ route('blog.delete', $blog->id) }}" method="POST">
                                            @csrf 
                                            @method('DELETE')
                                            <button class="del-btn">
                                                <span><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></span>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
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