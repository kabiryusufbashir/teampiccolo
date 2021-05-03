@extends('layouts.template')

@section('page-meta')
<meta name="description" content="Get free ebooks on Software solutions and I.C.T training.">
<meta name="keywords" content="PHP, MySQL, File, Document, Writer, ebook, Entrepreneur, Information Technology, Kano, Training">
@endsection

@section('page-title')
    Ebook | Team Piccolo Global Enterprises
@endsection

@section('body-content')
    <!-- ebook  -->
    @if($ebooks->count())
        <div class="page-title">
            Team Piccolo Ebooks 
        </div>
        <div class="lg:grid lg:grid-cols-3 gap-8 lg:mx-24">
            <div class="col-span-2 my-auto">
                @foreach($ebooks as $ebook)
                <div class="w-full py-6 px-6 border-t-2">
                    <h3 class="paragraph-title">
                        <a class="hover:text-blue-600 hover:underline" target="_blank" href="{{ $ebook->path }}">
                            {{ $ebook->name }}
                        </a>
                    </h3>
                </div>
                @endforeach
            </div>
            <div class="col-span-1 border-t-2 lg:border-t-0">
                @foreach($staffs as $staff)
                <div class="lg:ml-auto shadow-lg p-6 m-6">
                    <img class="h-36 my-4 mx-auto" src="{{ $staff->photo }}" alt="{{ $staff->name }}">
                    <h3 class="paragraph-title text-center">{{ $staff->name }}</h3>
                    <h3 class="text-center text-green-500">{{ $staff->title }}</h3>
                </div>
                @endforeach            
            </div>
        </div>
    @else
        <div class="text-2xl lg:mx-32 px-4 my-6 relative top-10 my-24">
            No ebook Post found!
        </div>
    @endif
    <div class="my-6 mx-3">
        {{ $ebooks->links() }}
    </div>
@endsection