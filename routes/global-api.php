<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

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

/* --------------------------
    company_name
------------------------ */

Route::prefix('globalInfo')->group(function () {
    Route::get('/list', [FrontController::class, 'company_details']);
});

/* --------------------------
    category_list
------------------------ */

Route::prefix('globalCategory')->group(function () {
    Route::get('/list', [FrontController::class, 'category_list']);
} );

/* --------------------------
    productList
------------------------ */

Route::prefix('globalBlog')->group(function () {
    Route::post('/list', [FrontController::class, 'blog_list']);
} );
