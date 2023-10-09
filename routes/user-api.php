<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MediaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* -------------------------
    auth user Controller
--------------------------- */

Route::group(
    ['middleware' => ['UserAuth'], 'prefix' => 'auth'],
    function () {
        Route::post('/login', [FrontController::class, 'login'])->name('User.Auth.Login');
        Route::post('/register', [FrontController::class, 'register'])->name('User.Auth.Register');
        Route::post('/forgot', [FrontController::class, 'forgot'])->name('User.Auth.Forgot');
        Route::post('/reset', [FrontController::class, 'reset'])->name('User.Auth.Reset');
    }
);

/* -------------------------
    user Profile Controller
--------------------------- */

Route::group(
    ['middleware' => ['UserAuthReq'], 'prefix' => 'profile'],
    function () {
        Route::get('/details', [FrontController::class, 'profile_details'])->name('User.Profile.Details');
        Route::post('/update', [FrontController::class, 'profile_update'])->name('User.Profile.Update');
        Route::get('/account_update', [FrontController::class, 'profile_account_update'])->name('User.Profile.Account_Update');
        Route::post('/password', [FrontController::class, 'profile_password'])->name('User.Profile.Password');
        Route::get('/logout', [FrontController::class, 'profile_logout'])->name('User.Profile.Logout');
    }
);

/* -------------------------
    Media Controller
--------------------------- */

Route::prefix('media')->group( function () {
    Route::post('/upload', [MediaController::class, 'upload'])->name('User.Media.Upload');
});
