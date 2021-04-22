<div class="bg-gray-600">
    <div class="md:flex md:justify-between md:grid md:grid-cols-4 py-3">
        <!-- system details -->
        <div class="mx-3 flex items-center justify-between col-span-1">
            <img class="w-10" src="{{ $system_settings->photo ?? asset('images/logo.png') }}" alt="Logo">
            <a href="{{ route('courses') }}">
                <h2 class="text-white ml-2 text-2xl">Team Piccolo Course Module</h2>
            </a>
        </div>
        <!-- user details -->
        <div class="flex justify-center mt-4 md:mt-0 items-center md:justify-end col-span-3 mr-3">
            <!-- User Account  -->
            <div class="flex text-white items-center relative inline-block">
                <span class="flex cursor-pointer" id="user_caret">
                    <!-- <svg class="w-6 h-6 text-white ml-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg> -->
                    <b class="relative top-1 font-normal">{{auth()->user()->name}}</b>
                    &nbsp;
                    <img class="w-10" src="{{ $user->photo ?? asset('images/logo.png') }}" alt="Logo">
                    <svg id="caret" class="w-5 h-5 my-auto" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>    
                </span>
                <div id="user_caret_menu" class="hidden absolute top-5 right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                    <div class="py-1 text-sm text-gray-700" aria-orientation="vertical">
                        <span class="user-setting-caret">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                            &nbsp;&nbsp;
                            <a href="#" class="">Edit profile</a>
                        </span>
                        <span class="user-setting-caret">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z"></path></svg>
                            &nbsp;&nbsp;
                            <a href="#" class="">Change Password</a>
                        </span>
                        <span class="user-setting-caret">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                            &nbsp;&nbsp;
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf 
                                <button class="focus:outline-none focus:bg-gray-100 focus:text-gray-900" type="submit" name="logout">Logout</button>
                            </form>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>