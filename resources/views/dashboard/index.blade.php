<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    <!-- Nav  -->
    @include('includes.nav')
    <div class="text-2xl bg-white text-center border-b shadow py-2">
        @include('layouts.messages')
    </div>
    <!-- #menu  -->
    <div class="md:grid md:grid-cols-5">
        <!-- Nav link  -->
        @include('includes.menu')
        <!-- Stats -->
        <div id="statsDiv" class="col-span-4">
            <!-- System Stats  -->
            <div class="md:grid md:grid-cols-4 md:gap-4 mx-2 my-6">
                <!-- client  -->
                <a href="{{ route('client.index') }}">
                    <div class="stats-card">
                        <div>
                            <img class="stats-icon bg-blue-400" src="{{ asset('images/client_icon.png') }}" alt="Client Icon">
                        </div>
                        <div>
                            <div class="stats-value">{{ $client->count() }}</div>
                            <div class="bg-blue-400 text-white px-4 py-1 rounded-lg flex items-center">
                                <span>clients</span>
                                &nbsp;
                                <span>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                </span>
                            </div>    
                        </div>
                    </div>
                </a>
                <!-- Student  -->
                <a href="{{ route('student.all.index') }}">
                    <div class="stats-card">
                        <div>
                            <img class="stats-icon bg-yellow-400" src="{{ asset('images/students_icon.png') }}" alt="Student Icon">
                        </div>
                        <div>
                            <div class="stats-value">{{ $students->count() }}</div>
                            <div class="bg-yellow-500 text-white px-4 py-1 rounded-lg flex items-center">
                                <span>Students</span>
                                &nbsp;
                                <span>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                </span>
                            </div>    
                        </div>
                    </div>
                </a>
                <!-- Staff  -->
                <a href="{{ route('staff.index') }}">
                    <div class="stats-card">
                        <div>
                            <img class="stats-icon bg-green-400" src="{{ asset('images/staff_icon.png') }}" alt="Staff Icon">
                        </div>
                        <div>
                            <div class="stats-value">{{ $staff->count() }}</div>
                            <div class="bg-green-500 text-white px-4 py-1 rounded-lg flex items-center">
                                <span>Staff</span>
                                &nbsp;
                                <span>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                </span>
                            </div>    
                        </div>
                    </div>
                </a>
                <!-- Blog  -->
                <a href="{{ route('blog.index') }}">
                    <div class="stats-card">
                        <div>
                            <img class="stats-icon bg-purple-400" src="{{ asset('images/blog_icon.png') }}" alt="Blog Icon">
                        </div>
                        <div>
                            <div class="stats-value">{{ $blog->count() }}</div>
                            <div class="bg-purple-500 text-white px-4 py-1 rounded-lg flex items-center">
                                <span>Blog</span>
                                &nbsp;
                                <span>
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                </span>
                            </div>    
                        </div>
                    </div>
                </a>
            </div>
            <div class="lg:w-3/4 mx-auto">
                <form id="paymentForm" class="bg-white shadow-lg p-4" action="{{ route('pay') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                    <h3>Buy Movie Tickets N500.00</h3>
                
                    <input class="input-box" name="name" placeholder="Name" />
                    <input class="input-box" name="email" type="email" placeholder="Your Email" />
                    <input class="input-box" name="phone" type="tel" placeholder="Phone number" />

                    <div class="px-6 py-4 flex justify-end">
                        <button type="submit" class="btn-submit tracking-wider">Buy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>