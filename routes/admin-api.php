<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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
    Auth Admin Controller
--------------------------- */

Route::group(
    ['middleware' => ['AdminAuth'], 'prefix' => 'auth'],
    function () {
        Route::post('/login', [AdminController::class, 'login'])->name('Admin.Auth.Login');
        Route::post('/forgot', [AdminController::class, 'forgot'])->name('Admin.Auth.Forgot');
        Route::post('/reset', [AdminController::class, 'reset'])->name('Admin.Auth.Reset');
    }
);

/* -------------------------
    Admin Profile Controller
--------------------------- */

Route::group(
    ['middleware' => ['AdminAuthReq'], 'prefix' => 'profile'],
    function () {
        Route::get('/details', [AdminController::class, 'profile_details'])->name('Admin.Profile.Details');
        Route::post('/update', [AdminController::class, 'profile_update'])->name('Admin.Profile.Update');
        Route::get('/account_update', [AdminController::class, 'profile_account_update'])->name('Admin.Profile.Account_Update');
        Route::post('/password', [AdminController::class, 'profile_password'])->name('Admin.Profile.Password');
        Route::get('/logout', [AdminController::class, 'profile_logout'])->name('Admin.Profile.Logout');
    }
);

/* -------------------------
    Admin Settings Controller
--------------------------- */

Route::group(
    ['middleware' => ['AdminAuthReq'], 'prefix' => 'settings'],
    function () {
        Route::get('/details', [AdminController::class, 'settings_details'])->name('Admin.Settings.Details');
        Route::post('/update', [AdminController::class, 'settings_update'])->name('Admin.Settings.Update');
    }
);

/* -------------------------
    Category Controller
--------------------------- */

Route::prefix('category')->group( function () {
    Route::post('/create', [AdminController::class, 'categoryCreate'])->name('Category.Create');
    Route::post('/update', [AdminController::class, 'categoryUpdate'])->name('Category.Update');
    Route::post('/list', [AdminController::class, 'categoryList'])->name('Category.List');
    Route::post('/single', [AdminController::class, 'categorySingle'])->name('Category.Single');
    Route::post('/delete', [AdminController::class, 'categoryDelete'])->name('Category.Delete');
});

/* -------------------------
    Blog Controller
--------------------------- */

Route::prefix('blog')->group( function () {
    Route::post('/create', [AdminController::class, 'blogCreate'])->name('Blog.Create');
    Route::post('/update', [AdminController::class, 'blogUpdate'])->name('Blog.Update');
    Route::post('/list', [AdminController::class, 'blogList'])->name('Blog.List');
    Route::post('/single', [AdminController::class, 'blogSingle'])->name('Blog.Single');
    Route::post('/delete', [AdminController::class, 'blogDelete'])->name('Blog.Delete');
});

/* -------------------------
    Media Controller
--------------------------- */

Route::prefix('media')->group( function () {
    Route::post('/upload', [MediaController::class, 'upload'])->name('Admin.Media.Upload');
    Route::post('/update', [MediaController::class, 'update'])->name('Admin.Media.Update');
});
