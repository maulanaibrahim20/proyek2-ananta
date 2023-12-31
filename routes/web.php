<?php

use App\Http\Controllers\Admin\DataClientController;
use App\Http\Controllers\Admin\MakeupContentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\DataOwnerController;
use App\Http\Controllers\Owner\KatalogMakeupController;
use App\Http\Controllers\Owner\TypeMakeupController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!re
|
*/

Route::get('/', [LandingController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::resource('/register', RegisterController::class);

Route::group(['middleware' => ['autentikasi']], function () {
    Route::get('/admin/dashboard', [AppController::class, 'admin']);
    // Route::get('/admin/daftar_akun_client', function () {
    //     return view('admin.pages.akun_client');
    // });
    Route::resource('/admin/data_client', DataClientController::class);
    Route::resource('/admin/data_owner', DataOwnerController::class);

    Route::get('/admin/content', [MakeupContentController::class, 'index']);
    Route::get('/admin/content/view/{id}', [MakeupContentController::class, 'show']);
    Route::post('/admin/content/changestatus', [MakeupContentController::class, 'changeStatus']);

    Route::get('/owner/dashboard', [AppController::class, 'owner']);
    Route::resource('/owner/katalog_makeup', KatalogMakeupController::class);
    Route::resource('/owner/type_makeup', TypeMakeupController::class);



    Route::get('/client/dashboard', [AppController::class, 'client']);



    Route::get('/logout', [LoginController::class, 'logout']);
});
