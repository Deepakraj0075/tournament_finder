<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HosterController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->middleware('guest')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['role:hoster']], function () {
    Route::get('/hoster/dashboard', [HosterController::class, 'index'])->name('hoster.dashboard');
    Route::get('/hoster/add-event', [HosterController::class, 'create'])->name('hoster.event.create');
    Route::post('/hoster/add-event', [HosterController::class, 'store'])->name('hoster.event.store');
   
    //Route::get('/hoster/registered-event/{id}', [HosterController::class, 'registeredEventView'])->name('hoster.registered.view');
    Route::get('/hoster/view-event/{id}', [HosterController::class, 'viewEvent'])->name('hoster.event.view');

    Route::get('/hoster/edit-event/{id}', [HosterController::class, 'edit'])->name('hoster.event.edit');
    Route::get('/hoster/delete/{id}', [HosterController::class, 'destroy'])->name('hoster.event.delete');
});

Route::group(['middleware' => ['role:user']], function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/user/registered-event', [UserController::class, 'registeredEvent'])->name('user.registered.list');
    Route::get('/user/registered-event/{id}', [UserController::class, 'registeredEventView'])->name('user.registered.view');
    Route::get('/user/view-event/{id}', [UserController::class, 'viewEvent'])->name('user.event.view');
    Route::post('/user/view-event/{id}', [UserController::class, 'storeEvent'])->name('user.event.store');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/view-event/{id}', [AdminController::class, 'viewEvent'])->name('admin.event.view');
});

require __DIR__ . '/auth.php';
