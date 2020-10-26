<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Role;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

// Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');
// Route::view('/', 'auth.login');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('createusers', function(){
	$user = new User;
	$user->name = "Administrator";
	$user->email = "admin@admin.com";
	$user->role = 1;
	$user->password = password_hash("verysecret", PASSWORD_DEFAULT);
	$user->save();

	$user = new User;
	$user->name = "Manager";
	$user->email = "manager@manager.com";
	$user->role = 2;
	$user->password = password_hash("verysecret", PASSWORD_DEFAULT);
	$user->save();

	$user = new User;
	$user->name = "User";
	$user->email = "user@user.com";
	$user->role = 3;
	$user->password = password_hash("verysecret", PASSWORD_DEFAULT);
	$user->save();

});

Route::get('createroles', function(){
	$user = new Role;
	$user->role_name = "Administrator";
	$user->save();

	$user = new Role;
	$user->role_name = "Manager";
	$user->save();

	$user = new Role;
	$user->role_name = "User";
	$user->save();
});

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('admin');
Route::get('/manager', [App\Http\Controllers\ManagerController::class, 'index'])->name('manager')->middleware('manager');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user')->middleware('user');

// Route::get('/login', [App\Http\Controllers\HomeController::class, 'index'])->name('login');
