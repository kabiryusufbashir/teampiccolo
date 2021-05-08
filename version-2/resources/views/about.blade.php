@extends('layouts.template')

@section('page-meta')
<meta name="description" content="Team Piccolo Global Enterprises an ICT solution and Academic Writing provider in Nigeria and Africa, with major projects realized in different parts of the country and region">
<meta name="keywords" content="About, Piccolo, Team, Enroll, Computer Essentials, Web Development, Mobile Applicaation, Entrepreneur,Information Technology, Kano, Training">
@endsection

@section('page-title')
    About Us | Team Piccolo Global Enterprises
@endsection

@section('body-content')
<div class="md:grid md:grid-cols-2 pt-24 md:pt-16 pb-6 md:gap-4 md:gap-16 md:mx-24">
    <div>
        <h1 class="border-b-2 border-green-600 text-green-600 mx-10 md:mx-16 text-4xl mb-2 py-2">About Us</h1>
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
        <p class="paragraph">
            Our team comprises of trained and certified experts in engineering and academic work, a number of whom have had experience of working on international: project design, management, implementation roles, and given academic talks. This team of engineers are assisted by support teams in the process of design, procurement, delivery and quality control to ensure that we provide value for every client, every time.
        </p><p class="paragraph">
            Our team comprises of trained and certified experts in engineering and academic work, a number of whom have had experience of working on international: project design, management, implementation roles, and given academic talks. This team of engineers are assisted by support teams in the process of design, procurement, delivery and quality control to ensure that we provide value for every client, every time.
        </p><p class="paragraph">
            Our team comprises of trained and certified experts in engineering and academic work, a number of whom have had experience of working on international: project design, management, implementation roles, and given academic talks. This team of engineers are assisted by support teams in the process of design, procurement, delivery and quality control to ensure that we provide value for every client, every time.
        </p><p class="paragraph">
            Our team comprises of trained and certified experts in engineering and academic work, a number of whom have had experience of working on international: project design, management, implementation roles, and given academic talks. This team of engineers are assisted by support teams in the process of design, procurement, delivery and quality control to ensure that we provide value for every client, every time.
        </p>
    </div>
    <div class="text-center mx-6 md:mx-24 text-green-600 md:my-auto">
        @foreach($staffs as $staff)
            <div class="card">
                <div>
                    <img class="p-2 mx-auto h-48" src=" {{ $staff->photo }} " alt="{{ $staff->name }} Image">    
                </div>
                <div class="font-medium text-xl py-1">
                    {{ $staff->name }} <br>
                    <span class="font-normal text-lg">{{  $staff->title }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection