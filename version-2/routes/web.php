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
Route::get('/courses', [EnrollController::class, 'courses'])->name('courses')->middleware('auth');
Route::get('/play-video/{video}', [EnrollController::class, 'playVideo'])->name('play.video');
Route::get('/show-course/{course}', [EnrollController::class, 'showCourse'])->name('show.course');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth:admin');

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