<div class="bg-green-600">
    <div class="md:flex md:justify-between md:grid md:grid-cols-4 py-3">
        <!-- system details -->
        <div class="mx-3 flex items-center justify-between col-span-1">
            <img class="w-10" src="{{ $system_settings->photo ?? asset('images/logo.png') }}" alt="Logo">
            <h2 class="text-white ml-2 text-2xl">Team Piccolo</h2>
            <svg id="menuCaret" class="w-8 h-8 text-white cursor-pointer" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </div>
        <!-- user details -->
        <div class="flex justify-center mt-4 md:mt-0 items-center md:justify-end col-span-3 mr-3">
            <!-- Notifications -->
            <div class="flex relative">
                <svg class="w-6 h-6 text-white mx-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg></span>
                <span class="bg-red-500 rounded-full px-1 absolute -top-3 left-8 w-auto text-center text-white">228</span>
            </div>
            <!-- Messages  -->
            <div class="flex relative">
                <svg class="w-6 h-6 text-white mx-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path></svg>
                <span class="bg-red-500 rounded-full px-1 absolute -top-3 left-8 w-auto text-center text-white">108</span> &nbsp;&nbsp;
            </div>
            <!-- User Account  -->
            <div class="flex text-white items-center relative inline-block">
                <span class="flex cursor-pointer" id="user_caret">
                    <!-- <svg class="w-6 h-6 text-white ml-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg> -->
                    <b class="relative top-1 font-normal">{{auth()->user()->name}}</b>
                    &nbsp;
                    <img class="w-10 h-10 rounded-full" src="{{ auth()->user()->photo ?? asset('images/logo.png') }}" alt="Logo">
                    <svg id="caret" class="w-5 h-5 my-auto" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>    
                </span>
                <div id="user_caret_menu" class="hidden absolute top-5 right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                    <div class="py-1 text-sm text-gray-700" aria-orientation="vertical">
                        <span class="user-setting-caret">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                            &nbsp;&nbsp;
                            <form action="{{ route('admin.profile.edit', auth()->user()->id) }}" >
                                @csrf 
                                <button class="focus:outline-none focus:bg-gray-100 focus:text-gray-900">Edit Account</button>
                            </form>
                        </span>
                        <span class="user-setting-caret">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a5 5 0 00-5 5v2a2 2 0 00-2 2v5a2 2 0 002 2h10a2 2 0 002-2v-5a2 2 0 00-2-2H7V7a3 3 0 015.905-.75 1 1 0 001.937-.5A5.002 5.002 0 0010 2z"></path></svg>
                            &nbsp;&nbsp;
                            <form action="{{ route('admin.profile.change-password', auth()->user()->id) }}" >
                                @csrf 
                                <button class="focus:outline-none focus:bg-gray-100 focus:text-gray-900">Change Password</button>
                            </form>
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