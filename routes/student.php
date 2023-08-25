<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Student\dasheboard\ExameController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\dasheboard\ProfileController;
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'isstudent']
    ],


    function () {

        Route::prefix('student')->group(function () {
            Route::view('dashboard', 'pages.Students.dashboard');
            Route::get('exames', [ExameController::class, 'index']);
            Route::get('subjects',[ProfileController::class,'index_subjects']);
            Route::get('books',[ProfileController::class,'book']);


            Route::get('question/{id}', [ExameController::class, 'show']);
            Route::get('profile',[ProfileController::class,'index']);
            Route::post('update',[ProfileController::class,'update']);
            Route::get('download_book/{filename}',[ProfileController::class,'download_file']);
        });
    }
);
