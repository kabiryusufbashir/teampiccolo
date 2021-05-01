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
            Team Piccolo Ebook 
        </div>
        @foreach($ebooks as $ebook)
            <div class="w-full lg:w-1/3 mx-auto shadow-lg py-24 lg:py-12 px-6 border-t-2">
                <h3 class="paragraph-title">
                    <a class="hover:text-blue-600 hover:underline" target="_blank" href="{{ $ebook->path }}">
                        {{ $ebook->name }}
                    </a>
                </h3>
            </div>
        @endforeach
    @else
        <div class="text-2xl lg:mx-32 px-4 my-6 relative top-10 my-24">
            No ebook Post found!
        </div>
    @endif
    <div class="my-6 mx-3">
        {{ $ebooks->links() }}
    </div>
@endsection