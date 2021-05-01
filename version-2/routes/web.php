<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EbookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [AdminController::class, 'index'])->name('home');
Route::get('/blog-post', [AdminController::class, 'blog'])->name('blog');
Route::get('/e-book', [AdminController::class, 'ebook'])->name('ebook');
Route::get('/blog-post/{blog}', [AdminController::class, 'readBlog'])->name('blog.read');
Route::get('/about-us', function () { return view('about'); })->name('about');
Route::get('/contact', function () { return view('contact'); })->name('contact');
Route::post('/subcribe-newsletter', [NewsletterController::class, 'store'])->name('news-letter');
Route::post('/contact', [AdminController::class, 'contact'])->name('contact');

//Set Up
Route::get('/setup', [AdminController::class, 'setup'])->name('setup');
Route::post('/setup', [AdminController::class, 'create'])->name('setup-system');

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('sign-in');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Enroll
Route::get('/enroll', [EnrollController::class, 'index'])->name('enroll');
Route::post('/register', [EnrollController::class, 'create'])->name('register');
Route::get('/verify', function () { return view('auth.verify'); })->name('verify');
Route::post('/verify', [EnrollController::class, 'verify'])->name('verify');

//Students
Route::get('/courses', [StudentController::class, 'courses'])->name('courses')->middleware('auth');
Route::get('/play-video/{video}', [StudentController::class, 'playVideo'])->name('play.video')->middleware('auth');
Route::get('/show-course/{course}', [StudentController::class, 'showCourse'])->name('show.course')->middleware('auth');
Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.profile.edit')->middleware('auth');
Route::patch('/student/{student}/update', [StudentController::class, 'update'])->name('student.profile.update')->middleware('auth');
Route::get('/student/{student}/change-password', [StudentController::class, 'changePassword'])->name('student.profile.change-password')->middleware('auth');
Route::patch('/student/{student}/change-password', [StudentController::class, 'passwordUpdate'])->name('student.profile.passwordUpdate')->middleware('auth');
Route::post('/logout-student', [StudentController::class, 'logout'])->name('logout.student')->middleware('auth');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth:admin');

    //Profile
    Route::get('/profile/{profile}/edit', [DashboardController::class, 'edit'])->name('admin.profile.edit')->middleware('auth:admin');
    Route::patch('/profile/{profile}/update', [DashboardController::class, 'update'])->name('admin.profile.update')->middleware('auth:admin');
    Route::get('/profile/{profile}/change-password', [DashboardController::class, 'changePassword'])->name('admin.profile.change-password')->middleware('auth:admin');
    Route::patch('/profile/{profile}/change-password', [DashboardController::class, 'passwordUpdate'])->name('admin.profile.passwordUpdate')->middleware('auth:admin');

    //Course
    Route::get('/course', [CourseController::class, 'index'])->name('course.index')->middleware('auth:admin');
    Route::get('/course/create', [CourseController::class, 'create'])->name('course.create')->middleware('auth:admin');
    Route::post('/course', [CourseController::class, 'store'])->name('course.store')->middleware('auth:admin');
    Route::get('/course/{course}', [CourseController::class, 'show'])->name('course.show')->middleware('auth:admin');
    Route::get('/course/video/{course}', [CourseController::class, 'playVideo'])->name('course.play.video')->middleware('auth:admin');
    Route::get('/course/{course}/edit', [CourseController::class, 'edit'])->name('course.edit')->middleware('auth:admin');
    Route::patch('/course/{course}/update', [CourseController::class, 'update'])->name('course.update')->middleware('auth:admin');
    Route::delete('/course/{course}', [CourseController::class, 'destroy'])->name('course.delete')->middleware('auth:admin');

    //Video
    Route::get('/video', [VideoController::class, 'index'])->name('video.index')->middleware('auth:admin');
    Route::get('/video/create', [VideoController::class, 'create'])->name('video.create')->middleware('auth:admin');
    Route::post('/video', [VideoController::class, 'store'])->name('video.store')->middleware('auth:admin');
    Route::get('/video/{video}', [VideoController::class, 'show'])->name('video.show')->middleware('auth:admin');
    Route::get('/video/{video}/edit', [VideoController::class, 'edit'])->name('video.edit')->middleware('auth:admin');
    Route::patch('/video/{video}/update', [VideoController::class, 'update'])->name('video.update')->middleware('auth:admin');
    Route::delete('/video/{video}', [VideoController::class, 'destroy'])->name('video.delete')->middleware('auth:admin');

    //Blog
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index')->middleware('auth:admin');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create')->middleware('auth:admin');
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store')->middleware('auth:admin');
    Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show')->middleware('auth:admin');
    Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit')->middleware('auth:admin');
    Route::patch('/blog/{blog}/update', [BlogController::class, 'update'])->name('blog.update')->middleware('auth:admin');
    Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('blog.delete')->middleware('auth:admin');

    //Ebooks
    Route::get('/ebook', [EbookController::class, 'index'])->name('ebook.index')->middleware('auth:admin');
    Route::get('/ebook/create', [EbookController::class, 'create'])->name('ebook.create')->middleware('auth:admin');
    Route::post('/ebook', [EbookController::class, 'store'])->name('ebook.store')->middleware('auth:admin');
    Route::get('/ebook/{ebook}/edit', [EbookController::class, 'edit'])->name('ebook.edit')->middleware('auth:admin');
    Route::patch('/ebook/{ebook}/update', [EbookController::class, 'update'])->name('ebook.update')->middleware('auth:admin');
    Route::delete('/ebook/{ebook}', [EbookController::class, 'destroy'])->name('ebook.delete')->middleware('auth:admin');