<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BookAreaController;
use App\Http\Controllers\Backend\RoomTypeController;
use App\Http\Controllers\Backend\TeamController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [UserController::class, 'index']);

Route::get('/dashboard', function () {
    return view('site.dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::post('/profile/store', [UserController::class, 'store'])->name('profile.store');
    Route::get('/profile/logout', [UserController::class, 'destroy'])->name('profile.logout');
    Route::get('/profile/change/password', [UserController::class, 'changePassword'])->name('profile.change.password');
    Route::post('/profile/password/update', [UserController::class, 'passwordUpdate'])->name('profile.password.update');
});

require __DIR__.'/auth.php';

//Admin Group Middleware
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'profileStore'])->name('admin.profile.store');

    Route::get('/admin/change/password', [AdminController::class, 'changePassword'])->name('admin.change.password');
    Route::post('/admin/password/update', [AdminController::class, 'passwordUpdate'])->name('admin.password.update');

});
//End Admin Group Middleware

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

//Admin Group Middleware
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::controller(TeamController::class)->group(function () {
        Route::get('/all/team', 'allTeam')->name('all.team');
        Route::get('/add/team', 'addTeam')->name('add.team');
        Route::post('/team/store', 'store')->name('team.store');
        Route::get('/team/edit/{id}', 'edit')->name('team.edit');
        Route::put('/team/update', 'update')->name('team.update');
        Route::get('/team/delete/{id}', 'delete')->name('team.delete');
    });
});
//End Admin Group Middleware

//Book Area Group Middleware
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::controller(BookAreaController::class)->group(function () {
        Route::get('/book/area', 'bookArea')->name('book.area');
        Route::post('/book/area', 'update')->name('book.area.update');
    });
});
//End Book Area Group Middleware
//Room Type Group Middleware
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::controller(RoomTypeController::class)->group(function () {
        Route::get('/room/type/list', 'index')->name('room.type');
        //Route::post('/book/area', 'update')->name('book.area.update');
    });
});
//End Room Type Group Middleware