@extends('layouts.template')

@section('page-meta')
<meta name="description" content="Team Piccolo Global Enterprises comprises of trained and certified experts in Information Technology, Engineering and Academic work, a number of whom have had experience of working on international: project design, management, implementation roles, and given academic talks.">
<meta name="keywords" content="Entrepreneur,Information Technology, Kano, Training">
@endsection

@section('page-title')
    Home | Team Piccolo Global Enterprises
@endsection

@section('body-content')
    <!-- Services  -->
    <div class="lg:grid grid-cols-3 gap-8 lg:mx-32 px-4 text-center my-6">
        <div>
            <h3 class="font-medium text-2xl">I.C.T Training</h3>
            <img class="my-4 w-32 mx-auto" src="{{ asset('images/training.png') }}" alt="Training">
            <p class="my-4 text-justify">
                "Anyone who stops learning is old, whether at twenty or eighty. Anyone who keeps learning stays young"<br>
                <b>Henry Ford</b>
            </p>
        </div>
        <div>
            <h3 class="font-medium text-2xl">Software Solutions</h3>
            <img class="my-4 w-32 mx-auto" src="{{ asset('images/code.png') }}" alt="Software Solutions">
            <p class="my-4 text-justify">
                "If you build a car, you can only sell it once. If you paint a fence, you only get paid for it once. If you create a piece of software that's essentially free to reproduce, you can keep getting paid over and over perpetually"<br>
                <b>Markus Persson</b>
            </p>
        </div>
        <div>
            <h3 class="font-medium text-2xl">I.C.T Consultation</h3>
            <img class="my-4 w-32 mx-auto" src="{{ asset('images/consultation.png') }}" alt="Consultation">
            <p class="my-4 text-justify">
                "It is easy to spend a ton of money and a ton of time on a business and the advertising of it. Many do. Consider putting the money and the time into the educating, building and protecting of a business to allow for the right results, with the smallest costs and the least amount of time"<br>
                <b>Create Wealth Communities</b>
            </p>
        </div>
    </div>
    <!-- Partners -->
    <div class="my-6 shadow-lg py-6">
        <div class="lg:mx-32 px-4 text-4xl">
            Our Partners
        </div>
        <div class="lg:grid grid-cols-6 gap-8 lg:mx-32 px-4 py-6">
            <div>One</div>
            <div>Two</div>
            <div>Three</div>
            <div>Four</div>
            <div>Five</div>
            <div>Six</div>
        </div>
    </div>
@endsection