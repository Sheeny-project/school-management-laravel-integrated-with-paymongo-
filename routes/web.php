<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware('auth')->group(function () {
        Route::view('about', 'about')->name('about');
        Route::get('student', [\App\Http\Controllers\StudentDashboard::class, 'index'])->name('student.dashboard.show');
        Route::get('student/available/subject', [\App\Http\Controllers\StudentDashboard::class, 'showSubjectCourse']);
        Route::get('student/events', [\App\Http\Controllers\StudentDashboard::class, 'getEvents']);
        Route::get('student/enroll/subject', [\App\Http\Controllers\StudentDashboard::class, 'getAvailableSubjects']);
        Route::get('/get/student/data/{id}', [\App\Http\Controllers\StudentDashboard::class, 'getStudentChoice'])->name('get.student.data');
        Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
        Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
        Route::post('/payment', [\App\Http\Controllers\PaymentController::class, 'pay'])->name('payment.pay');
        Route::post('student/enroll/all/subject', [\App\Http\Controllers\StudentDashboard::class, 'enrollSubject']);
        Route::get('enrolled/subject', [\App\Http\Controllers\EnrolledSubject::class, 'index'])->name('get.enrolled');
        Route::get('/enrolled/subject/all', [\App\Http\Controllers\EnrolledSubject::class, 'getEnrolledSubject']);
        Route::get('/payment/success', [\App\Http\Controllers\PaymentSuccess::class, 'index'])->name('payment.success');
        Route::get('/payment/failed', [\App\Http\Controllers\PaymentSuccess::class, 'paymentFailed'])->name('payment.failed');

        Route::middleware('isAuth')->group(function () {
            Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
            Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
            Route::get('dashboard/enrolled', [\App\Http\Controllers\Enrolled::class, 'index'])->name('enrolled.index');
            Route::get('users/show', [\App\Http\Controllers\UserController::class, 'show_user'])->name('users');
            Route::get('enrollment/application', [\App\Http\Controllers\ApplicationForm::class, 'index'])->name('application.form');
            Route::get('dashboard/enrollment', [\App\Http\Controllers\EnrollmentDashboard::class, 'index'])->name('dashboard.enrollment');
            Route::get('management', [\App\Http\Controllers\ManagementDashboard::class, 'index'])->name('management.show');
            Route::get('finance', [\App\Http\Controllers\FinanceDashboard::class, 'index'])->name('finance.show');
            Route::get('finance/event', [\App\Http\Controllers\FinanceEvent::class, 'index'])->name('finance.event');
            Route::get('finance/accountabilities', [\App\Http\Controllers\FinanceAccountabilities::class, 'index'])->name('finance.accountability');
            Route::post('add/course', [\App\Http\Controllers\ManagementDashboard::class, 'addCourse'])->name('add.course');
            Route::get('/enrolled/student', [\App\Http\Controllers\Enrolled::class, 'show_enrolled']);
            Route::get('/finance/accountabilities/unpaid', [\App\Http\Controllers\FinanceAccountabilities::class, 'getAccountabilities']);
            Route::get('show/course', [\App\Http\Controllers\ManagementDashboard::class, 'showCourse']);
            Route::post('application', [\App\Http\Controllers\ApplicationForm::class, 'add_student'])->name('add.student');
            Route::post('add/event', [\App\Http\Controllers\FinanceEvent::class, 'insertEvent'])->name('add.event');
            Route::post('add/subject', [\App\Http\Controllers\ManagementDashboard::class, 'addSubject'])->name('add.subject');
            Route::get('get/notif', [\App\Http\Controllers\UserController::class, 'getAllNotif']);
            Route::get('show/subject/{id}', [\App\Http\Controllers\SubjectController::class, 'index'])->name('show.subject');
            Route::get('/subject/all/{id}', [\App\Http\Controllers\SubjectController::class, 'showSubject']);
            Route::get('/room', [\App\Http\Controllers\Room::class, 'index'])->name('room');
            Route::get('/section', [\App\Http\Controllers\Section::class, 'index'])->name('section');
            Route::post('/room/add', [\App\Http\Controllers\Room::class, 'createRoom'])->name('add.room');
            Route::post('/section/add', [\App\Http\Controllers\SubjectController::class, 'addSection'])->name('add.section');
            Route::post('/section/add/info', [\App\Http\Controllers\Section::class, 'addSection'])->name('add.section.info');
            Route::get('/room/show', [\App\Http\Controllers\Room::class, 'showRoom']);
            Route::get('/section/show', [\App\Http\Controllers\Section::class, 'allSection']);
            Route::get('/course/all', [\App\Http\Controllers\SubjectController::class, 'returnCourse']);
            Route::get('/room/section/all', [\App\Http\Controllers\Room::class, 'showSection']);
            Route::get('/section/show/all', [\App\Http\Controllers\Section::class, 'getSectionDetails']);
        });
});
