<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Myparent\dashboard\MyParentDashController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'iaparent']
    ],
    function () {
        Route::prefix('parent')->group(function () {

            Route::get('dashboard', [MyParentDashController::class, 'index']);
            // Route::view('parent/dashboard', 'pages.parents.dashboard');
            Route::get('attendance', [MyParentDashController::class, 'attendance']);
            Route::post('report', [MyParentDashController::class, 'report']);
            Route::get('degree', [MyParentDashController::class, 'show_degree']);
            Route::get('fees', [MyParentDashController::class, 'fees']);
            Route::get('recipt/{id}', [MyParentDashController::class, 'show_recipt']);
            Route::get('profile', [MyParentDashController::class, 'profile_index']);
            Route::post('update_profile', [MyParentDashController::class, 'update_profile']);
        });
    }
);
