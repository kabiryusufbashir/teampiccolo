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
                        <a href="{{ route('record.create') }}">
                            <button class="create-btn">
                                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg> 
                                Add Record
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="md:grid md:grid-cols-2 md:gap-8 md:mx-10 md:my-16">
                <div class="card">
                    <div class="font-medium text-3xl py-12 bg-green-600 text-white text-left px-4">
                        Debit <br>
                        <span class="font-normal text-xl">Total: {{ $debit->count() }}</span><br>
                        <span class="font-normal text-xl">Sum: N{{ $debit->sum('amount') }}</span><br>
                        <span class="font-normal text-xl"><a class="text-white-600 hover:text-gray-600 underline" href="{{ route('record.debit', 'debit') }}">Check Transaction</a></span>
                    </div>
                </div>
                <div class="card">
                    <div class="font-medium text-3xl py-12 bg-green-600 text-white text-left px-4">
                        Credit <br>
                        <span class="font-normal text-xl">Total: {{ $credit->count() }}</span><br>
                        <span class="font-normal text-xl">Sum: N{{ $credit->sum('amount') }}</span><br>
                        <span class="font-normal text-xl"><a class="text-white-600 hover:text-gray-600 underline" href="{{ route('record.credit', 'credit') }}">Check Transaction</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>