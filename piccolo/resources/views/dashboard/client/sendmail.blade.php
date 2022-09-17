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
                        <a href="{{ route('client.index') }}">
                            <button class="create-btn">
                                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> 
                                All Client
                            </button>
                        </a>
                    </div>
                    <div>
                        @if($client->count())
                            <div class="shadow-lg p-4 lg:w-2/3 lg:mx-auto">
                                <div class="my-6 mx-3 text-3xl font-medium">
                                    <img class="w-32 h-32 md:w-48 md:h-48 mx-auto" src=" {{ $client->photo }}" alt=" {{ $client->name }} logo">
                                </div>
                                <div class="my-2 p-2 mx-3 border-b  border-r text-lg">
                                    You will be compose message to <b>{{ $client->name }}</b> of <b>{{ $client->company }}</b>
                                </div>
                                <form action="{{ route('client.send.mail') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="my-2">
                                    <input style="display:none;" type="text" name="client_id" value="{{ $client->id }}">
                                    <textarea id="content" name="message" class="px-5 w-full border border-gray-400 h-24 rounded-lg my-2 text-lg focus:outline-none @error('message') border-red-500 @enderror" placeholder="Compose Message"></textarea>
                                        @error('message')
                                            {{$message}}
                                        @enderror
                                    </div>
                                    <div class="px-6 py-4 flex justify-end">
                                        <button type="submit" class="btn-submit tracking-wider">Send Mail</button>
                                    </div>
                                </form>
                            </div>
                        @else
                            <div class="bg-white text-2xl text-center py-2">
                                No client Found
                            </div>
                        @endif
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
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>