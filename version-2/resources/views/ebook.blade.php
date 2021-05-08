@extends('layouts.template')

@section('page-meta')
<meta name="description" content="Get free ebooks on Software solutions and I.C.T training.">
<meta name="keywords" content="PHP, MySQL, File, Document, Writer, ebook, Entrepreneur, Information Technology, Kano, Training">
@endsection

@section('page-title')
    Ebook | Team Piccolo Global Enterprises
@endsection

@section('body-content')
    @if($ebooks->count())
        <div class="page-title">
            Team Piccolo ebook 
        </div>
        <div class="md:grid md:grid-cols-2 md:gap-4 md:gap-16 md:mx-24">
            @foreach($ebooks as $ebook)
                <a href="{{ $ebook->path }}">
                    <div class="stats-card hover:shadow-lg text-green-600 hover:bg-green-600 hover:text-white">
                        <div>
                            <div class="text-left px-4 text-xl font-medium">Download: {{ $ebook->download }}</div>
                            <div class="text-dark px-4 py-1">
                                <span>{{ $ebook->name }}</span>
                            </div>    
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="text-2xl lg:mx-32 px-4 my-6 relative top-10 my-24">
            No Ebook found!
        </div>
    @endif
    <div class="my-6 mx-3">
        {{ $ebooks->links() }}
    </div>
    
@endsection