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
Route::get('/blog', [AdminController::class, 'blog'])->name('blog');
Route::get('/blog/web-development', [AdminController::class, 'webDevelopment'])->name('web.development');
Route::get('/blog/mobile-development', [AdminController::class, 'mobileDevelopment'])->name('mobile.development');
Route::get('/blog/computer-application', [AdminController::class, 'computerApplication'])->name('computer.application');
Route::get('/blog/it-news', [AdminController::class, 'itNews'])->name('it.news');
Route::get('/ebook', [AdminController::class, 'ebook'])->name('ebook');
Route::get('/ebook/{ebook}', [AdminController::class, 'ebookDownload'])->name('ebook.download');
Route::get('/blog/{blog}', [AdminController::class, 'readBlog'])->name('blog.read');
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
    Route::get('/dashboard/profile/{profile}/edit', [DashboardController::class, 'edit'])->name('admin.profile.edit')->middleware('auth:admin');
    Route::patch('/dashboard/profile/{profile}/update', [DashboardController::class, 'update'])->name('admin.profile.update')->middleware('auth:admin');
    Route::get('/dashboard/profile/{profile}/change-password', [DashboardController::class, 'changePassword'])->name('admin.profile.change-password')->middleware('auth:admin');
    Route::patch('/dashboard/profile/{profile}/change-password', [DashboardController::class, 'passwordUpdate'])->name('admin.profile.passwordUpdate')->middleware('auth:admin');

    //Course
    Route::get('/dashboard/course', [CourseController::class, 'index'])->name('course.index')->middleware('auth:admin');
    Route::get('/dashboard/course/create', [CourseController::class, 'create'])->name('course.create')->middleware('auth:admin');
    Route::post('/dashboard/course', [CourseController::class, 'store'])->name('course.store')->middleware('auth:admin');
    Route::get('/dashboard/course/{course}', [CourseController::class, 'show'])->name('course.show')->middleware('auth:admin');
    Route::get('/dashboard/course/video/{course}', [CourseController::class, 'playVideo'])->name('course.play.video')->middleware('auth:admin');
    Route::get('/dashboard/course/{course}/edit', [CourseController::class, 'edit'])->name('course.edit')->middleware('auth:admin');
    Route::patch('/dashboard/course/{course}/update', [CourseController::class, 'update'])->name('course.update')->middleware('auth:admin');
    Route::delete('/dashboard/course/{course}', [CourseController::class, 'destroy'])->name('course.delete')->middleware('auth:admin');

    //Video
    Route::get('/dashboard/video', [VideoController::class, 'index'])->name('video.index')->middleware('auth:admin');
    Route::get('/dashboard/video/create', [VideoController::class, 'create'])->name('video.create')->middleware('auth:admin');
    Route::post('/dashboard/video', [VideoController::class, 'store'])->name('video.store')->middleware('auth:admin');
    Route::get('/dashboard/video/{video}', [VideoController::class, 'show'])->name('video.show')->middleware('auth:admin');
    Route::get('/dashboard/video/{video}/edit', [VideoController::class, 'edit'])->name('video.edit')->middleware('auth:admin');
    Route::patch('/dashboard/video/{video}/update', [VideoController::class, 'update'])->name('video.update')->middleware('auth:admin');
    Route::delete('/dashboard/video/{video}', [VideoController::class, 'destroy'])->name('video.delete')->middleware('auth:admin');

    //Blog
    Route::get('/dashboard/blog', [BlogController::class, 'index'])->name('blog.index')->middleware('auth:admin');
    Route::post('/dashboard/ckeditor/upload', [BlogController::class, 'uploadImage'])->name('ckeditor.image-upload');
    Route::get('/dashboard/blog/create', [BlogController::class, 'create'])->name('blog.create')->middleware('auth:admin');
    Route::post('/dashboard/blog', [BlogController::class, 'store'])->name('blog.store')->middleware('auth:admin');
    Route::get('/dashboard/blog/{blog}', [BlogController::class, 'show'])->name('blog.show')->middleware('auth:admin');
    Route::get('/dashboard/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit')->middleware('auth:admin');
    Route::patch('/dashboard/blog/{blog}/update', [BlogController::class, 'update'])->name('blog.update')->middleware('auth:admin');
    Route::delete('/dashboard/blog/{blog}', [BlogController::class, 'destroy'])->name('blog.delete')->middleware('auth:admin');

    //Ebooks
    Route::get('/dashboard/ebook', [EbookController::class, 'index'])->name('ebook.index')->middleware('auth:admin');
    Route::get('/dashboard/ebook/create', [EbookController::class, 'create'])->name('ebook.create')->middleware('auth:admin');
    Route::post('/dashboard/ebook', [EbookController::class, 'store'])->name('ebook.store')->middleware('auth:admin');
    Route::get('/dashboard/ebook/{ebook}/edit', [EbookController::class, 'edit'])->name('ebook.edit')->middleware('auth:admin');
    Route::patch('/dashboard/ebook/{ebook}/update', [EbookController::class, 'update'])->name('ebook.update')->middleware('auth:admin');
    Route::delete('/dashboard/ebook/{ebook}', [EbookController::class, 'destroy'])->name('ebook.delete')->middleware('auth:admin');

    //Staff
    Route::get('/dashboard/staff', [StaffController::class, 'index'])->name('staff.index')->middleware('auth:admin');
    Route::get('/dashboard/staff/create', [StaffController::class, 'create'])->name('staff.create')->middleware('auth:admin');
    Route::post('/dashboard/staff', [StaffController::class, 'store'])->name('staff.store')->middleware('auth:admin');
    Route::get('/dashboard/staff/{staff}', [StaffController::class, 'show'])->name('staff.show')->middleware('auth:admin');
    Route::get('/dashboard/staff/{staff}/edit', [StaffController::class, 'edit'])->name('staff.edit')->middleware('auth:admin');
    Route::patch('/dashboard/staff/{staff}/update', [StaffController::class, 'update'])->name('staff.update')->middleware('auth:admin');
    Route::delete('/dashboard/staff/{staff}', [StaffController::class, 'destroy'])->name('staff.delete')->middleware('auth:admin');

    //Student
    Route::get('/dashboard/all-student', [DashboardController::class, 'allStudent'])->name('student.all.index')->middleware('auth:admin');
    Route::get('/dashboard/all-student/{student}', [DashboardController::class, 'studentShow'])->name('student.all.show')->middleware('auth:admin');
    Route::get('/dashboard/all-student/{student}/edit', [DashboardController::class, 'studentEdit'])->name('student.all.edit')->middleware('auth:admin');
    Route::patch('/dashboard/all-student/{student}/update', [DashboardController::class, 'studentUpdate'])->name('student.all.update')->middleware('auth:admin');
    Route::delete('/dashboard/all-student/{student}', [DashboardController::class, 'studentDestroy'])->name('student.all.delete')->middleware('auth:admin');

    //Client
    Route::get('/dashboard/client', [ClientController::class, 'index'])->name('client.index')->middleware('auth:admin');
    Route::get('/dashboard/client/create', [ClientController::class, 'create'])->name('client.create')->middleware('auth:admin');
    Route::post('/dashboard/client', [ClientController::class, 'store'])->name('client.store')->middleware('auth:admin');
    Route::get('/dashboard/client/{client}', [ClientController::class, 'show'])->name('client.show')->middleware('auth:admin');
    Route::get('/dashboard/client/{client}/edit', [ClientController::class, 'edit'])->name('client.edit')->middleware('auth:admin');
    Route::patch('/dashboard/client/{client}/update', [ClientController::class, 'update'])->name('client.update')->middleware('auth:admin');
    Route::delete('/dashboard/client/{client}', [ClientController::class, 'destroy'])->name('client.delete')->middleware('auth:admin');
    Route::get('/dashboard/client-compose-mail/{client}', [ClientController::class, 'composeMail'])->name('client.compose.mail')->middleware('auth:admin');
    Route::post('/dashboard/client-send-mail', [ClientController::class, 'sendMail'])->name('client.send.mail')->middleware('auth:admin');

    //Financial Records
    Route::get('/dashboard/record', [RecordController::class, 'index'])->name('record.index')->middleware('auth:admin');
    Route::get('/dashboard/record/create', [RecordController::class, 'create'])->name('record.create')->middleware('auth:admin');
    Route::post('/dashboard/record', [RecordController::class, 'store'])->name('record.store')->middleware('auth:admin');
    Route::get('/dashboard/record/{record}', [RecordController::class, 'show'])->name('record.show')->middleware('auth:admin');
    Route::get('/dashboard/record/debit/{record}', [RecordController::class, 'showDebit'])->name('record.debit')->middleware('auth:admin');
    Route::get('/dashboard/record/credit/{record}', [RecordController::class, 'showCredit'])->name('record.credit')->middleware('auth:admin');
    Route::get('/dashboard/record/{record}/edit', [RecordController::class, 'edit'])->name('record.edit')->middleware('auth:admin');
    Route::patch('/dashboard/record/{record}/update', [RecordController::class, 'update'])->name('record.update')->middleware('auth:admin');
    Route::delete('/dashboard/record/{record}', [RecordController::class, 'destroy'])->name('record.delete')->middleware('auth:admin');

    //Weeklyletter
    Route::get('/dashboard/weeklyletter', [NewsletterController::class, 'index'])->name('weeklyletter.index')->middleware('auth:admin');
    Route::get('/dashboard/weeklyletter/create', [NewsletterController::class, 'create'])->name('weeklyletter.create')->middleware('auth:admin');
    Route::post('/dashboard/weeklyletter', [NewsletterController::class, 'store'])->name('weeklyletter.store')->middleware('auth:admin');
    Route::post('/dashboard/weeklyletter-send', [NewsletterController::class, 'send'])->name('weeklyletter.send')->middleware('auth:admin');
    Route::get('/dashboard/weeklyletter/{weeklysletter}', [NewsletterController::class, 'show'])->name('weeklyletter.show')->middleware('auth:admin');
    Route::get('/dashboard/weeklyletter/{weeklyletter}/edit', [NewsletterController::class, 'edit'])->name('weeklyletter.edit')->middleware('auth:admin');
    Route::patch('/dashboard/weeklyletter/{weeklyletter}/update', [NewsletterController::class, 'update'])->name('weeklyletter.update')->middleware('auth:admin');
    Route::delete('/dashboard/weeklyletter/{weeklyletter}', [NewsletterController::class, 'destroy'])->name('weeklyletter.delete')->middleware('auth:admin');