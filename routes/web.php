<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;

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

/* --------------------------
    Admin Authentication Controller
------------------------ */

Route::middleware('AdminLoginCheck')->get('/admin/auth/{any}', [AdminController::class, 'index'])->where('any', '.*')->name('lvs.admin.auth');
Route::middleware('AdminLoginCheck')->get('/admin/', [AdminController::class, 'index'])->where('any', '.*')->name('lvs.admin');
Route::middleware('AdminLoginCheck')->get('/admin/{any}', [AdminController::class, 'index'])->where('any', '.*')->name('lvs.admin.any');
Route::get('/admin', function (){ return redirect()->route('lvs.admin.any','dashboard'); });

/* --------------------------
    User Authentication Controller
------------------------ */

Route::middleware('UserLoginCheck')->get('/front/auth/{any}', [FrontController::class, 'index'])->where('any', '.*')->name('lvs.front.auth');
Route::middleware('UserLoginCheck')->get('/front/profile', [FrontController::class, 'index'])->name('lvs.front.profile');
Route::middleware('UserLoginCheck')->get('/front/my_account', [FrontController::class, 'index'])->name('lvs.front.my_account');

/* --------------------------
    Front Controller
------------------------ */

Route::get('/front/profile/', function (){ return redirect()->route('lvs.front.any','my_account'); });
Route::get('/front/{any}', [FrontController::class, 'index'])->where('any', '.*')->name('lvs.front.any');
Route::get('/front/', [FrontController::class, 'index'])->where('any', '.*')->name('lvs.front');
Route::get('/', function (){ return redirect()->route('lvs.front.any','home'); });
