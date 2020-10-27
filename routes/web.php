<?php

declare(strict_types=1);

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Dashboard;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::middleware(['auth', Dashboard::class])->group(
    static function () {
        Route::get(
            '/',
            static function () {
                return view('home');
            }
        )
            ->name('home');

        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/manager', [ManagerController::class, 'index'])->name('manager');
        Route::get('/user', [UserController::class, 'index'])->name('user');
    }
);
