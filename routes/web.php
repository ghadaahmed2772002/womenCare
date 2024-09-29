<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ShippingAddressController;
use App\Http\Controllers\CategoryChildController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
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
//########################  dashboard-main-route  ######################

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard')->middleware('checkrole');



//########################  sign up  ######################

Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/register', function () {return view('dashboard.auth.signup');})->name('register');

//########################  sign up  ######################

Route::get('/login', function () {return view('dashboard.auth.signin');})->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');

//########################  sign out  ######################

Route::get('/logout', function () {return view('dashboard.auth.signout');})->name('logout');
Route::post('/logout', [UserController::class, 'logout'])->name('logout.post');

//########################  companies routes  ######################

Route::resource('companies', CompanyController::class);

Route::get('dashboard/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('dashboard/companies/create', [CompanyController::class, 'create'])->name('companies.create');
Route::post('dashboard/companies', [CompanyController::class, 'store'])->name('companies.store');
Route::get('dashboard/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
Route::get('dashboard/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
Route::put('dashboard/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
Route::delete('dashboard/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');


//########################  admins routes  ######################

Route::resource('admins', AdminController::class);
Route::get('dashboard/admins', [AdminController::class, 'index'])->name('admin.index');
Route::get('dashboard/admins/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('dashboard/admins', [AdminController::class, 'store'])->name('admin.store');
Route::get('dashboard/admins/{admin}', [AdminController::class, 'show'])->name('admin.show');
Route::get('dashboard/admins/{admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('dashboard/admins/{admin}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('dashboard/admins/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');



//########################  users routes  ######################


Route::get('dashboard/users', [UserController::class, 'index'])->name('user.index');
Route::get('dashboard/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('dashboard/users/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('dashboard/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');


//########################  categories routes  ######################

Route::resource('categories', CategoryController::class);
Route::get('dashboard/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('dashboard/categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('dashboard/categories', [CategoryController::class, 'store'])->name('category.store');
Route::get('dashboard/categories/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('dashboard/categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/dashboard/categories/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('dashboard/categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');


//########################  Discount routes  ######################

Route::resource('discounts', DiscountController::class);
Route::get('dashboard/discounts', [DiscountController::class, 'index'])->name('discount.index');
Route::get('dashboard/discounts/create', [DiscountController::class, 'create'])->name('discount.create');
Route::post('dashboard/discounts', [DiscountController::class, 'store'])->name('discount.store');
Route::get('dashboard/discounts/{discount}', [DiscountController::class, 'show'])->name('discount.show');
Route::get('dashboard/discounts/{discount}/edit', [DiscountController::class, 'edit'])->name('discount.edit');
Route::put('/dashboard/discounts/{discount}', [DiscountController::class, 'update'])->name('discount.update');
Route::delete('dashboard/discounts/{discount}', [DiscountController::class, 'destroy'])->name('discount.destroy');

//########################  Messages routes  ######################
Route::resource('messages', MessageController::class);

//########################  Shipping Addresses routes  ######################
Route::resource('shipping_addresses', ShippingAddressController::class);

//########################  Category Child routes  ######################
Route::resource('category_childs', CategoryChildController::class);

//########################  Products routes  ######################
Route::resource('products', ProductController::class);


//########################  Orders routes  ######################
Route::resource('orders', OrderController::class);

//########################  Orders  items routes  ######################
Route::resource('order_items', OrderItemController::class);

