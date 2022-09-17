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
                        <a href="{{ url()->previous( ) }}">
                            <button class="create-btn">
                                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> 
                                Back
                            </button>
                        </a>
                    </div>
                    <div>
                        @if($record->count())
                            <div class="shadow-lg p-4 lg:w-2/3 lg:mx-auto bg-green-600 text-white rounded">
                                <div class="my-2 p-2 mx-3 border-t">
                                    Transaction Type: {{ $record->transaction_type }}
                                </div>
                                <div class="my-2 p-2 mx-3 border-t">
                                    Amount: {{ $record->amount }}
                                </div>
                                <div class="my-2 p-2 mx-3 border-t">
                                    Transaction Details: {!! html_entity_decode($record->transaction_details) !!}
                                </div>
                                <div class="my-2 p-2 mx-3 border-t">
                                    Date of Transaction: {{ \Carbon\Carbon::parse($record->date_of_transaction)->format('d M Y') }}
                                </div>
                                <div class="my-2 p-2 mx-3 border-t">
                                    Signed By: {{ $record->admin->name }}
                                </div>
                            </div>
                        @else
                            <div class="bg-white text-2xl text-center py-2">
                                No Record Found
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