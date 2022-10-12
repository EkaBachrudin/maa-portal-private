<?php

use App\Http\Controllers\adm\AdminController;
use App\Http\Controllers\adm\NewsController;
use App\Http\Controllers\adm\ProfileController;
use App\Http\Controllers\adm\RegulationController;
use App\Http\Controllers\adm\SopController;
use App\Http\Controllers\adm\UserController as AdmUserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ConsumenController;
use App\Http\Controllers\user\RegulationController as UserRegulationController;
use App\Http\Controllers\usr\NewsController as UsrNewsController;
use App\Http\Controllers\usr\ProfileController as UsrProfileController;
use App\Http\Controllers\usr\SopController as UsrSopController;
use App\Http\Controllers\usr\UserController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

//User Area
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [UserController::class, 'index']);

    Route::get('/maa/regulation', [UserRegulationController::class, 'index']);
    Route::get('/maa/regulation/{regulation}', [UserRegulationController::class, 'detail']);

    Route::get('/maa/sop', [UsrSopController::class, 'index']);
    Route::get('/maa/sop/{sop}', [UsrSopController::class, 'detail']);
    Route::get('/maa/sop/pdfView/{id}', [UsrSopController::class, 'pdfView']);
    Route::get('/maa/sop/downloadfile/{sop}', [UsrSopController::class, 'downloadfile']);

    Route::get('/maa/profile', [UsrProfileController::class, 'index']);
    Route::post('/maa/profile/update/{user}', [UsrProfileController::class, 'update']);
    Route::post('/maa/profile/updatepassword/{user}', [UsrProfileController::class, 'updatePassword']);

    Route::get('/maa/news', [UsrNewsController::class, 'index']);
    Route::get('/maa/news/{news}', [UsrNewsController::class, 'detail']);
});

//Admin Area
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/admin/profile', [ProfileController::class, 'index']);
    Route::post('/admin/profile/update/{user}', [ProfileController::class, 'update']);
    Route::post('/admin/profile/updatepassword/{user}', [ProfileController::class, 'updatePassword']);

    Route::get('/admin/user', [AdmUserController::class, 'index']);
    Route::get('/admin/user/add', [AdmUserController::class, 'user_add']);
    Route::post('/admin/user/create', [AdmUserController::class, 'create']);
    Route::get('/admin/user/edit/{user}', [AdmUserController::class, 'user_edit']);
    Route::post('/admin/user/update/{user}', [AdmUserController::class, 'update']);
    Route::post('/admin/user/updatepassword/{user}', [AdmUserController::class, 'updatePassword']);
    Route::get('/admin/news/delete/{user}', [AdmUserController::class, 'delete']);
    
    Route::get('/admin/news', [NewsController::class, 'index']);
    Route::get('/admin/news/add', [NewsController::class, 'news_add']);
    Route::post('/admin/news/create', [NewsController::class, 'create']);
    Route::get('/admin/news/edit/{news}', [NewsController::class, 'news_edit']);
    Route::post('/admin/news/update/{news}', [NewsController::class, 'update']);
    Route::get('/admin/news/delete/{news}', [NewsController::class, 'delete']);

    Route::get('/admin/sop', [SopController::class, 'index']);
    Route::get('/admin/sop/add', [SopController::class, 'sop_add']);
    Route::post('/admin/sop/create', [SopController::class, 'create']);
    Route::get('/admin/sop/edit/{sop}', [SopController::class, 'sop_edit']);
    Route::post('/admin/sop/update/{sop}', [SopController::class, 'update']);
    Route::get('/admin/sop/delete/{sop}', [SopController::class, 'delete']);

    Route::get('/admin/regulation', [RegulationController::class, 'index']);
    Route::get('/admin/regulation/add', [RegulationController::class, 'regulation_add']);
    Route::post('/admin/regulation/create', [RegulationController::class, 'create']);
    Route::get('/admin/regulation/edit/{regulation}', [RegulationController::class, 'regulation_edit']);
    Route::post('/admin/regulation/update/{regulation}', [RegulationController::class, 'update']);
    Route::get('/admin/regulation/delete/{regulation}', [RegulationController::class, 'delete']);
});
