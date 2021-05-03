<!-- Nav link  -->
<div id="menu" class="hidden md:block px-3 bg-white col-span-1 shadow-lg">
    <h2 class="text-2xl py-3 border-b font-medium">Menu</h2>
    <ul>
        <li class="py-3 flex border-b cursor-pointer">
            <a class="flex" href="{{ route('dashboard') }}">
                <img class="w-7 mr-4" src="{{ asset('images/dashboard.png') }}" alt="Dashboard">
                Dashboard
            </a>
        </li>
        
        <!-- Courses -->
        <li id="courseCaret" class="py-3 flex border-b cursor-pointer">
            <img class="w-7 mr-4" src="{{ asset('images/courses.png') }}" alt="Course">
            <a href="{{ route('course.index') }}">Courses</a>
            <svg id="coursePointer" class="users-caret" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </li>
        <div id="courseMenu" class="users-caret-menu hidden">
            <li class="py-3 flex border-b">
                <a href="{{ route('course.create') }}">Add Course</a>
            </li>
            <li class="py-3 flex border-b">
                <a href="{{ route('course.index') }}">All Courses</a>
            </li>
            <li class="py-3 flex border-b">
                <a href="{{ route('video.create') }}">Add Video</a>
            </li>
            <li class="py-3 flex">
                <a href="{{ route('video.index') }}">All Videos</a>
            </li>
        </div>

        <!-- Blog -->
        <li id="blogCaret" class="py-3 flex border-b cursor-pointer">
            <img class="w-7 mr-4" src="{{ asset('images/blog_icon.png') }}" alt="Blog">
            <a href="{{ route('blog.index') }}">Blog</a>
            <svg id="blogPointer" class="users-caret" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </li>
        <div id="blogMenu" class="users-caret-menu hidden">
            <li class="py-3 flex border-b">
                <a href="{{ route('blog.create') }}">Add Blog</a>
            </li>
            <li class="py-3 flex">
                <a href="{{ route('blog.index') }}">All Blog</a>
            </li>
        </div>

        <!-- E-books -->
        <li id="ebookCaret" class="py-3 flex border-t border-b cursor-pointer">
            <img class="w-7 mr-4" src="{{ asset('images/ebook.png') }}" alt="client">
            <a href="{{ route('ebook.index') }}">E-books</a>
            <svg id="ebookPointer" class="users-caret" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </li>
        <div id="ebookMenu" class="users-caret-menu hidden">
            <li class="py-3 flex border-b">
                <a href="{{ route('ebook.create') }}">Add E-books</a>
            </li>
            <li class="py-3 flex">
                <a href="{{ route('ebook.index') }}">All E-books</a>
            </li>
        </div>

        <!-- Staff -->
        <li id="staffCaret" class="py-3 flex border-t border-b cursor-pointer">
            <img class="w-7 mr-4" src="{{ asset('images/staff_icon.png') }}" alt="Staff">
            <a href="{{ route('staff.index') }}">Staff</a>
            <svg id="staffPointer" class="users-caret" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </li>
        <div id="staffMenu" class="users-caret-menu hidden">
            <li class="py-3 flex border-b">
                <a href="{{ route('staff.create') }}">Add Staff</a>
            </li>
            <li class="py-3 flex">
                <a href="{{ route('staff.index') }}">All Staff</a>
            </li>
        </div>

        <!-- Students -->
        <li id="StudentCaret" class="py-3 flex border-t border-b cursor-pointer">
            <img class="w-7 mr-4" src="{{ asset('images/students_icon.png') }}" alt="Students">
            <a href="{{ route('student.all.index') }}">Students</a>
            <svg id="StudentPointer" class="users-caret" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </li>
        <div id="StudentMenu" class="users-caret-menu hidden">
            <li class="py-3 flex">
                <a href="{{ route('student.all.index') }}">All Students</a>
            </li>
        </div>

        <!-- Clients -->
        <li id="clientCaret" class="py-3 flex border-t border-b cursor-pointer">
            <img class="w-7 mr-4" src="{{ asset('images/client_icon.png') }}" alt="client">
            <a href="#">Clients</a>
            <svg id="clientPointer" class="users-caret" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </li>
        <div id="clientMenu" class="users-caret-menu hidden">
            <li class="py-3 flex border-b">
                <a href="#">Add Clients</a>
            </li>
            <li class="py-3 flex">
                <a href="#">All Client</a>
            </li>
        </div>

        <!-- Financial Records -->
        <li id="clientCaret" class="py-3 flex border-b cursor-pointer">
            <img class="w-7 mr-4" src="{{ asset('images/sales_icon.png') }}" alt="Staff">
            <a href="#">Financial Records</a>
            <svg id="clientPointer" class="users-caret" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </li>
        <div id="clientMenu" class="users-caret-menu hidden">
            <li class="py-3 flex border-b">
                <a href="#">Add Record</a>
            </li>
            <li class="py-3 flex">
                <a href="#">All Record</a>
            </li>
        </div>

        <!-- NewsLetter -->
        <li id="clientCaret" class="py-3 flex border-b cursor-pointer">
            <img class="w-7 mr-4" src="{{ asset('images/sales_icon.png') }}" alt="Staff">
            <a href="#">NewsLetter</a>
            <svg id="clientPointer" class="users-caret" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </li>
        <div id="clientMenu" class="users-caret-menu hidden">
            <li class="py-3 flex border-b">
                <a href="#">Add NewsLetter</a>
            </li>
            <li class="py-3 flex">
                <a href="#">All NewsLetters</a>
            </li>
        </div>

        <!-- Logout  -->
        <li id="clientCaret" class="py-3 flex border-b cursor-pointer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf 
                <button class="flex focus:outline-none focus:bg-gray-100 focus:text-gray-900" type="submit" name="logout">
                    <img class="w-7 mr-4" src="{{ asset('images/logout_icon.png') }}" alt="Icon">
                    <span>Logout</span>
                </button>
            </form>
        </li>
    </ul>
</div>