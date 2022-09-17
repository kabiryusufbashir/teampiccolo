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
                        <a href="{{ route('weeklyletter.index') }}">
                            <button class="create-btn">
                                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> 
                                All Weekly Letter
                            </button>
                        </a>
                    </div>
                    <div>
                        @if($weeklyletter->count())
                            <div class="shadow-lg p-4 lg:w-3/4 lg:mx-auto">
                                <div class="my-6 mx-3 text-3xl font-medium">
                                    {{ $weeklyletter->title }} <br>
                                    <span class="font-normal text-lg">By {{ $weeklyletter->author->name }}</span><br>
                                    <span class="font-normal text-sm">{{ $weeklyletter->status }}</span>
                                </div>
                                <div class="md:my-auto text-lg">
                                    {!! html_entity_decode($weeklyletter->content) !!} <br>
                                </div>
                                <div class="my-3 mx-3">
                                    <form action="{{ route('weeklyletter.send') }}" method="POST">
                                        @csrf
                                        <div class="px-6 py-4 flex justify-end">
                                            <input style="display:none;" type="text" name="letter_id" value="{{ $weeklyletter->id }}">
                                            <button type="submit" class="btn-submit tracking-wider">Send to Subscribers</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="bg-white text-2xl text-center py-2">
                                No Weekly Letter Found
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