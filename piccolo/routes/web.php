<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\FlutterwaveController;

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
Route::get('/blog-post/web-development', [AdminController::class, 'webDevelopment'])->name('web.development');
Route::get('/blog-post/mobile-development', [AdminController::class, 'mobileDevelopment'])->name('mobile.development');
Route::get('/blog-post/computer-application', [AdminController::class, 'computerApplication'])->name('computer.application');
Route::get('/blog-post/it-news', [AdminController::class, 'itNews'])->name('it.news');
Route::get('/e-book', [AdminController::class, 'ebook'])->name('ebook');
Route::get('/e-book/{ebook}', [AdminController::class, 'ebookDownload'])->name('ebook.download');
Route::get('/blog-post/{blog}', [AdminController::class, 'readBlog'])->name('blog.read');
Route::get('/about-us', [AdminController::class, 'aboutUs'])->name('about');
Route::get('/contact', [AdminController::class, 'contactPage'])->name('contact');
Route::post('/subcribe-newsletter', [AdminController::class, 'subscribeToNewLetter'])->name('news-letter');
Route::post('/contact', [AdminController::class, 'contact'])->name('contact');

//Set Up
Route::get('/setup', [AdminController::class, 'setup'])->name('setup');
Route::post('/setup', [AdminController::class, 'create'])->name('setup-system');

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/check-number', [LoginController::class, 'forgotPasswordCheckNumber'])->name('forgot.password.check.number');
Route::get('/verify-number', function () { return view('auth.verifyphone'); })->name('verify.phone');
Route::post('/verify-number', [LoginController::class, 'verifyPhone'])->name('verify.phone');
Route::get('/change-password', [LoginController::class, 'changePassword'])->name('change.password');
Route::post('/change-password', [LoginController::class, 'confirmChangePassword'])->name('confirm.change.password');
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

    //Payment
    // The route that the button calls to initialize payment
    Route::post('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
    // The callback url after a payment
    Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');

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
    Route::post('ckeditor/upload', [BlogController::class, 'uploadImage'])->name('ckeditor.image-upload');
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

    //Staff
    Route::get('/staff', [StaffController::class, 'index'])->name('staff.index')->middleware('auth:admin');
    Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create')->middleware('auth:admin');
    Route::post('/staff', [StaffController::class, 'store'])->name('staff.store')->middleware('auth:admin');
    Route::get('/staff/{staff}', [StaffController::class, 'show'])->name('staff.show')->middleware('auth:admin');
    Route::get('/staff/{staff}/edit', [StaffController::class, 'edit'])->name('staff.edit')->middleware('auth:admin');
    Route::patch('/staff/{staff}/update', [StaffController::class, 'update'])->name('staff.update')->middleware('auth:admin');
    Route::delete('/staff/{staff}', [StaffController::class, 'destroy'])->name('staff.delete')->middleware('auth:admin');

    //Student
    Route::get('/all-student', [DashboardController::class, 'allStudent'])->name('student.all.index')->middleware('auth:admin');
    Route::get('/all-student/{student}', [DashboardController::class, 'studentShow'])->name('student.all.show')->middleware('auth:admin');
    Route::get('/all-student/{student}/edit', [DashboardController::class, 'studentEdit'])->name('student.all.edit')->middleware('auth:admin');
    Route::patch('/all-student/{student}/update', [DashboardController::class, 'studentUpdate'])->name('student.all.update')->middleware('auth:admin');
    Route::delete('/all-student/{student}', [DashboardController::class, 'studentDestroy'])->name('student.all.delete')->middleware('auth:admin');

    //Client
    Route::get('/client', [ClientController::class, 'index'])->name('client.index')->middleware('auth:admin');
    Route::get('/client/create', [ClientController::class, 'create'])->name('client.create')->middleware('auth:admin');
    Route::post('/client', [ClientController::class, 'store'])->name('client.store')->middleware('auth:admin');
    Route::get('/client/{client}', [ClientController::class, 'show'])->name('client.show')->middleware('auth:admin');
    Route::get('/client/{client}/edit', [ClientController::class, 'edit'])->name('client.edit')->middleware('auth:admin');
    Route::patch('/client/{client}/update', [ClientController::class, 'update'])->name('client.update')->middleware('auth:admin');
    Route::delete('/client/{client}', [ClientController::class, 'destroy'])->name('client.delete')->middleware('auth:admin');
    Route::get('/client-compose-mail/{client}', [ClientController::class, 'composeMail'])->name('client.compose.mail')->middleware('auth:admin');
    Route::post('/client-send-mail', [ClientController::class, 'sendMail'])->name('client.send.mail')->middleware('auth:admin');

    //Financial Records
    Route::get('/record', [RecordController::class, 'index'])->name('record.index')->middleware('auth:admin');
    Route::get('/record/create', [RecordController::class, 'create'])->name('record.create')->middleware('auth:admin');
    Route::post('/record', [RecordController::class, 'store'])->name('record.store')->middleware('auth:admin');
    Route::get('/record/{record}', [RecordController::class, 'show'])->name('record.show')->middleware('auth:admin');
    Route::get('/record/debit/{record}', [RecordController::class, 'showDebit'])->name('record.debit')->middleware('auth:admin');
    Route::get('/record/credit/{record}', [RecordController::class, 'showCredit'])->name('record.credit')->middleware('auth:admin');
    Route::get('/record/{record}/edit', [RecordController::class, 'edit'])->name('record.edit')->middleware('auth:admin');
    Route::patch('/record/{record}/update', [RecordController::class, 'update'])->name('record.update')->middleware('auth:admin');
    Route::delete('/record/{record}', [RecordController::class, 'destroy'])->name('record.delete')->middleware('auth:admin');

    //Weeklyletter
    Route::get('/weeklyletter', [NewsletterController::class, 'index'])->name('weeklyletter.index')->middleware('auth:admin');
    Route::get('/weeklyletter/create', [NewsletterController::class, 'create'])->name('weeklyletter.create')->middleware('auth:admin');
    Route::post('/weeklyletter', [NewsletterController::class, 'store'])->name('weeklyletter.store')->middleware('auth:admin');
    Route::post('/weeklyletter-send', [NewsletterController::class, 'send'])->name('weeklyletter.send')->middleware('auth:admin');
    Route::get('/weeklyletter/{weeklysletter}', [NewsletterController::class, 'show'])->name('weeklyletter.show')->middleware('auth:admin');
    Route::get('/weeklyletter/{weeklyletter}/edit', [NewsletterController::class, 'edit'])->name('weeklyletter.edit')->middleware('auth:admin');
    Route::patch('/weeklyletter/{weeklyletter}/update', [NewsletterController::class, 'update'])->name('weeklyletter.update')->middleware('auth:admin');
    Route::delete('/weeklyletter/{weeklyletter}', [NewsletterController::class, 'destroy'])->name('weeklyletter.delete')->middleware('auth:admin');