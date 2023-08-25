<?php

use App\Http\Controllers\Attendance\AttendanceController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Classroom\ClassroomController;
use App\Http\Controllers\Fees\FeesController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Invoice\InvoiceController;
use App\Http\Controllers\Librarry\LibrarryController;
use App\Http\Controllers\OnlineClass\OnlineclassController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Process_fee\Process_feesController;
use App\Http\Controllers\Question\QuestionController;
use App\Http\Controllers\Quizes\QuizeController;
use App\Http\Controllers\ReciptController;
use App\Http\Controllers\Section\SectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Student\Graduates\GraduateController;
use App\Http\Controllers\Student\Promotion\BromotionController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Subject\SubjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\TeacherController;
use App\Models\Librarry;
use App\Http\Livewire\Calendar;
use App\Models\Event;
use Livewire\Livewire;
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


// ------------------all guardes------------------
Route::view('test','empty');
Route::view('/', 'auth.selection')->middleware('Guest');
Route::get('login/{type}', [AuthController::class, 'logineForm'])->middleware('Guest');
Route::post('login', [AuthController::class, 'login']);
Route::post('auth/destroy/{guard}',[AuthController::class,'destroy']);
Livewire::component('calendar', Calendar::class);

// --------------------end ---------------------
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','Isadmin']
    ],
    function () {
        Route::get('admin/dashboard', [HomeController::class, 'index']);

        //Routes of grades-----------------------
        Route::group(['controller' => GradeController::class, 'prefix' => 'grades'], function () {
            Route::get('/', 'index');
            Route::post('store_grades', 'store_grades');
            Route::post('update_grades', 'update');
            Route::post('delete_grade', 'delete');
        });
        // Routes of classes-------------------
        Route::group(['prefix' => 'classroom', 'controller' => ClassroomController::class], function () {
            Route::get('/', 'index');
            Route::post('store_classes', 'store_classes');
            Route::post('update_classe', 'update');
            Route::post('delete', 'delete');
            Route::post('delete_all_classes', 'delete_all');
            Route::post('filter_with_Grade_id', 'filter_with_Grade_id');
        });
        // -----Routes of sections--------------
        Route::group(['prefix' => 'section', 'controller' => SectionController::class], function () {
            Route::get('/', 'index');
            Route::get('/getClasses/{grade_id}', 'getClasses');
            Route::post('store_section', 'store');
            Route::post('update_section', 'update');
            Route::post('delete_section', 'delete');
        });
        // ----------Routes parents--------------------
        Route::group(['prefix' => 'parents'], function () {
            Route::view('/', 'pages.parents.view_barents');
            Route::view('/add_parent', 'pages.parents.parents');
        });
        Route::group(['prefix' => 'teacher', 'controller' => TeacherController::class], function () {

            Route::get('/', 'get_all_teacher');
            Route::get('add_teacher', 'create');
            Route::post('store_teacher', 'store');
            Route::get('edit/{id}', 'edit');
            Route::post('update_teacher', 'update');
            Route::post('delete_teacher', 'delete');
        });
        Route::group(['prefix' => 'student', 'controller' => StudentController::class], function () {
            Route::get('/', 'index');
            Route::get('add_student', 'create');
            Route::get('ajax_get_classroom/{grade_id}', 'ajax_get_classroom');
            Route::get('ajax_get_sections/{classroom_id}', 'ajax_get_sections');
            Route::post('store_student', 'store');
            Route::get('edit/{id}', 'edit');
            Route::post('update_student', 'update');
            Route::post('delete', 'delete');
            Route::get('show_student/{id}', 'show_student');
            Route::post('uploade_new_image', 'uploade_new_image');
            Route::get('Download_image/{student_id}/{student_image}', 'Download_image');
            Route::get('delete_image/{id_image}/{student_id}/{student_image}', 'delete_image');
        });
        // ---------------routes promotion---------
        Route::resource('promotion', BromotionController::class);
        // -----------------graduate-------------------
        Route::resource('graduate', GraduateController::class);
        Route::post('graduate/soft_delete', [GraduateController::class, 'soft_delete']);
        // --------------fees--------------------------------------
        Route::resource('fees', FeesController::class);
        Route::resource('invoice', InvoiceController::class);
        Route::get('invoice/get_mount_byfees/{id}', [InvoiceController::class, 'get_mount_byfees']);
        Route::resource('recipt', ReciptController::class);
        Route::resource('process_fee', Process_feesController::class);
        Route::resource('payment', PaymentController::class);
        Route::resource('attendance', AttendanceController::class);
        Route::resource('subject', SubjectController::class);
        Route::resource('quize', QuizeController::class);
        Route::resource('question', QuestionController::class);
        Route::resource('onlineclass', OnlineclassController::class);
        Route::resource('book', LibrarryController::class);
        Route::get('book/download_file/{filename}', [LibrarryController::class, 'download_file']);
        Route::get('setting', [SettingController::class, 'index']);
        Route::post('setting/update', [SettingController::class, 'update']);
    }
);







// require __DIR__ . '/auth.php';
