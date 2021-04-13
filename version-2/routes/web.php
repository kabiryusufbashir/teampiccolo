<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\CourseController;

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
    Route::get('/add-course', [CourseController::class, 'create'])->name('create-course');
    Route::get('/all-course', [CourseController::class, 'index'])->name('all-course');
    Route::post('/add-course', [CourseController::class, 'store'])->name('add-course');