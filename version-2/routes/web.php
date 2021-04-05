<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\EnrollController;

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

Route::get('/', function () { return view('welcome'); })->name('home');
Route::get('/verify', function () { return view('auth.verify'); })->name('verify');
Route::get('/courses', function () { return view('courses.index'); })->name('courses');
Route::post('/subcribe-newsletter', [NewsletterController::class, 'store'])->name('news-letter');

Route::get('/enroll', [EnrollController::class, 'index'])->name('enroll');
Route::post('/register', [EnrollController::class, 'create'])->name('register');
Route::post('/verify', [EnrollController::class, 'verify'])->name('verify');



