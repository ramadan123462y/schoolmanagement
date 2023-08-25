<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Teacher\dashboard\DashboardController;
use App\Http\Controllers\Teacher\dashboard\ProfileTeacherController;
use App\Http\Controllers\Teacher\dashboard\QuestionController;
use App\Http\Controllers\Teacher\dashboard\QuizeController;
use App\Http\Controllers\Teacher\dashboard\StudentController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'Isteacher']
    ],
    function () {

        Route::prefix('teacher')->group(function () {
            Route::get('dashboard', [DashboardController::class, 'index']);
            Route::get('students', [StudentController::class, 'show_students']);
            Route::get('sections', [StudentController::class, 'sections']);
            Route::get('test', [DashboardController::class, 'index']);
            Route::post('attendance/store', [StudentController::class, 'store']);
            Route::post('attendance/update', [StudentController::class, 'update_attendance']);
            Route::get('report_attendance', [StudentController::class, 'report_attendance']);
            Route::post('report', [StudentController::class, 'report']);
            Route::resource('Quize', QuizeController::class);
            Route::get('ajax_get_classroom/{grade_id}', [QuizeController::class, 'ajax_get_classroom']);
            Route::get('ajax_get_sections/{classroom_id}', [QuizeController::class, 'ajax_get_sections']);
            Route::resource('Question', QuestionController::class);
            Route::get('profile',[ProfileTeacherController::class,'index']);
            Route::post('profile/update',[ProfileTeacherController::class,'update']);

        });
    }
);
