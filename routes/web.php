<?php

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

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;




Route::get('/', function () {
	return redirect('sign-in');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify'); 
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');


Route::group(['middleware' => 'auth'], function () {

	//Get All Items
	Route::get('/items', [ItemController::class, 'index'])->name('items');
	Route::post('/create-items', [ItemController::class, 'create'])->name('/create-items');
	Route::get('/edit-items/{id}', [ItemController::class, 'edit'])->name('edit-items');
	Route::post('/update-items', [ItemController::class, 'update'])->name('update-items');


	Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
	Route::post('/create-categories', [CategoryController::class, 'create'])->name('/create-categories');

	Route::get('/sales', [SalesController::class, 'index'])->name('sales');
	Route::post('/create-sales', [SalesController::class, 'create'])->name('/create-sales');

	Route::get('/orders', [OrdersController::class, 'index'])->name('orders');

	Route::post('/create-refund', [RefundController::class, 'create'])->name('/create-refund');

	//Get All Items
	Route::get('/user-roles', [RolesController::class, 'index'])->name('user-roles');
	Route::post('/create-roles', [RolesController::class, 'create'])->name('/create-roles');
	Route::get('/delete-roles', [RolesController::class, 'delete'])->name('delete-roles');

	Route::get('/user-management', [UsersController::class, 'index'])->name('user-management')->middleware('role:Admin,Super-Admin');
	Route::post('/create-users', [UsersController::class, 'create'])->name('/create-users');
	Route::get('/delete-users', [UsersController::class, 'delete'])->name('delete-users');



	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');
	Route::get('tables', function () {
		return view('pages.tables');
	})->name('tables');
	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
});