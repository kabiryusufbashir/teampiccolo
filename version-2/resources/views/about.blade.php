@extends('layouts.template')

@section('page-meta')
<meta name="description" content="Team Piccolo Global Enterprises an ICT solution and Academic Writing provider in Nigeria and Africa, with major projects realized in different parts of the country and region">
<meta name="keywords" content="About, Piccolo, Team, Enroll, Computer Essentials, Web Development, Mobile Applicaation, Entrepreneur,Information Technology, Kano, Training">
@endsection

@section('page-title')
    About Us | Team Piccolo Global Enterprises
@endsection

@section('header')
<div class="relative z-0 w-full h-screen">
    <div class="lg:grid grid-cols-2 w-full flex justify-between leading-snug items-center">
        <div class="hidden lg:block text-center bg-green-600 relative h-screen">
            <img class="w-full object-cover mx-auto w-full h-screen" src="{{ asset('images/about.jpg') }}" alt="About Us">
        </div>
        <div class="my-auto mt-24 w-full">
            <div class="mx-10 lg:mx-16 text-3xl mb-8">
                <span class="border-b-4 border-green-600">About Us</span>
            </div>
            <p class="paragraph">
                Team Piccolo is a Software Solutions provider, I.C.T Training and Academic Writing provider in Nigeria and Africa, with major projects realized in different parts of the country.
            </p>
            <p class="paragraph">
                We assist different organizations and individuals achieve their objectives through the state-of-the-art solutions we provide. We are passionate about supporting persons attaining their goal. We growing our business and driving operational excellence while making a positive impact on our community.
            </p>
            <p class="paragraph">
                We aim to be our customers first choice in every area we serve by exceeding commitments, providing new technology solutions, leveraging our diverse brands, driving operational excellence, and committing to the highest standards of business practices all of which will drive Team Piccolo long-term growth, value and success.
            </p>
            <p class="paragraph">
               Our team comprises of trained and certified experts in engineering and academic work, a number of whom have had experience of working on international: project design, management, implementation roles, and given academic talks. This team of engineers are assisted by support teams in the process of design, procurement, delivery and quality control to ensure that we provide value for every client, every time.
            </p>
        </div>
    </div>
</div>
@endsection