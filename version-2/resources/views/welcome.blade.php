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
    <!-- Products -->
    <div class="bg-blue-500 text-white">
        <div class="my-6 py-10">
            <div class="lg:mx-32 px-4 text-4xl">
                <span class="border-b-4 border-white">Products</span>
            </div>
            <div class="grid grid-cols-1 lg:grid lg:grid-cols-3 gap-8 lg:mx-32 px-4 py-6">
                <div class="text-center">
                    <img class="w-36 mx-auto" src="{{ asset('images/kamus.jpg') }}" alt="Kamus Dictionary">
                    <span class="text-xl">Kamus Dictionary</span>
                </div>
                <div class="text-center">
                    <img class="w-36 mx-auto" src="{{ asset('images/sms.jpg') }}" alt="School Management System">
                    <span class="text-xl">School Management System</span>
                </div>
                <div class="text-center">
                    <img class="w-36 mx-auto" src="{{ asset('images/hms.jpg') }}" alt="Hospital Management System">
                    <span class="text-xl">Hospital Management System</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial  -->
    <div class="bg-white shadow-lg">
        <div class="my-6 py-6 text-black">
            <div class="lg:mx-32 px-4 text-4xl">
                <span class="border-b-4 border-blue-400">Testimonials</span>
            </div>
            <div class="lg:mx-32 px-4 py-6" id="slideshow-example" data-component="slideshow">
                <div role="list" class="text-center">
                    <div class="slide">
                        <img class="w-56 mx-auto" src="{{ asset('images/awwal.png') }}" alt="Engr Awwal">
                        <h3 class="text-2xl font-medium pt-4">Engr. Auwal Abubakar Uthman</h3>
                        <h4 class="text-ms italic">Director Engineering/Centre Manager Amec Cad Training Institute</h3>
                        <p class="mx-auto text-2xl py-4">"Partnering with Team Piccolo as our I.C.T courses Instructor has been a great benefit to Amec Cad Training Institute. They did an amazing job designing our website, project was delivered on time and on budget."</p>
                    </div>
                    <div class="slide">
                        <img class="w-56 mx-auto" src="{{ asset('images/ismail.png') }}" alt="Ismail Kahioja">
                        <h3 class="text-2xl font-medium pt-4">Mr. Ismail Abdulmalik</h3>
                        <h4 class="text-ms italic">CTO Kahioja</h3>
                        <p class="mx-auto text-2xl py-4">"Leveraging Team Piccolo as our Software solution provider has been a great achievement for us at Kahioja. Team piccolo was able to implement our Logistics module on Kahioja within a short timeframe."</p>
                    </div>
                    <div class="slide">
                        <img class="w-56 mx-auto" src="{{ asset('images/abdul.png') }}" alt="Abdul S">
                        <h3 class="text-2xl font-medium pt-4">Abdul Bashir</h3>
                        <h4 class="text-ms italic">Founder and CEO Kamusdictionary</h3>
                        <p class="mx-auto text-2xl py-4">"Kamusdictionary wouldn't have been developed without Team Piccolo. Team Piccolo is a company with principles and always delivered on time and on budget."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partners -->
    <div class="my-6 py-6">
        <div class="lg:mx-32 px-4 text-4xl">
            <span class="border-b-4 border-blue-400">Our Partners</span>
        </div>
        <div class="grid grid-cols-2 lg:grid lg:grid-cols-6 gap-8 lg:mx-32 px-4 py-6">
            <div>
                <img class="w-36" src="{{ asset('images/thepyramid.png') }}" alt="Pyramid Newspaper">
            </div>
            <div>
                <img class="w-36" src="{{ asset('images/bowdi.png') }}" alt="Borno Women Development Initiative">
            </div>
            <div>
                <img class="w-36" src="{{ asset('images/zaufoundation.png') }}" alt="Zaufanjinba Foundation">
            </div>
            <div>
                <img class="w-36" src="{{ asset('images/kahioja.png') }}" alt="Kahioja Store">
            </div>
            <div>
                <img class="w-36" src="{{ asset('images/amecad.png') }}" alt="Ameccad Trainining Institute">
            </div>
            <div>
                <img class="w-36" src="{{ asset('images/swat.png') }}" alt="Swat Foundation">
            </div>
        </div>
    </div>
    
@endsection