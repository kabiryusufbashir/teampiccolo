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
                        <a href="{{ route('staff.index') }}">
                            <button class="create-btn">
                                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> 
                                All Staff
                            </button>
                        </a>
                    </div>
                    <div>
                        @if($staff->count())
                            <div class="shadow-lg p-4 lg:w-1/3 lg:mx-auto bg-green-600 text-white">
                                <div class="my-6 mx-3 text-3xl font-medium">
                                    <img class="w-32 h-32 md:w-48 md:h-48 mx-auto" src=" {{ $staff->photo }}" alt=" {{ $staff->name }} logo">
                                </div>
                                <div class="my-2 p-2 mx-3 border-b  border-r">
                                    Name: {{ $staff->name }}
                                </div>
                                <div class="my-2 p-2 mx-3">
                                    Rank: {{ $staff->title }}
                                </div>
                                <div class="my-2 p-2 mx-3 border-t">
                                    Email: {{ $staff->email }}
                                </div>
                                <div class="my-2 p-2 mx-3 border-t">
                                    Phone: {{ $staff->phone_number }}
                                </div>
                                <div class="my-2 p-2 mx-3 border-t">
                                    Account Type: 
                                        @if($staff->category == 1)
                                            Super User
                                        @else
                                            Regular User
                                        @endif
                                </div>
                                <div class="my-2 p-2 mx-3 border-l border-t">
                                    Account Created: {{ $staff->created_at->diffForHumans() }}
                                </div>
                            </div>
                        @else
                            <div class="bg-white text-2xl text-center py-2">
                                No Staff Found
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