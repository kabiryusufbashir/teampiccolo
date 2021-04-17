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
Route::get('/courses', function () { return view('courses.index'); })->name('courses')->middleware('auth');
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

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Course
    Route::get('/add-course', [CourseController::class, 'create'])->name('course.create');
    Route::get('/all-course', [CourseController::class, 'index'])->name('course.index');
    Route::post('/add-course', [CourseController::class, 'store'])->name('course.store');
    Route::get('/edit-course/{id}/edit', [CourseController::class, 'edit'])->name('course.edit');
    Route::patch('/edit-course/{id}/update', [CourseController::class, 'update'])->name('course.update');
    Route::delete('/del-course/{id}', [CourseController::class, 'destroy'])->name('course.delete');

    //Video
    Route::get('/add-video', [VideoController::class, 'create'])->name('video.create');
    Route::get('/all-video', [VideoController::class, 'index'])->name('video.index');
    Route::post('/add-video', [VideoController::class, 'store'])->name('video.store');
    Route::get('/edit-video/{id}/edit', [VideoController::class, 'edit'])->name('video.edit');
    Route::patch('/edit-video/{id}/update', [VideoController::class, 'update'])->name('video.update');
    Route::delete('/del-video/{id}', [VideoController::class, 'destroy'])->name('video.delete');