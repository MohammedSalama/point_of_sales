<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Pos\Category\Controllers\CategoryController;
use Pos\Invoice\Controllers\InvoiceController;
use Pos\Product\Controllers\ProductController;


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


// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
//     ], function(){

//     Route::group([],function () {


//         // Users
//         Route::get('/dashboard', function () {
//             return view('backend.dashboard');
//         })->middleware(['auth'])->name('dashboard');

//         // Admins
//         // Route::group( ['prefix' => 'backend','middleware' => ['auth', 'admin']], function() {};
//         Route::get('/admin_dashboard', function () {
//             return view('backend.admin_dashboard');
//         })->middleware(['auth:admin'])->name('admin_dashboard');


//             // Category
//             Route::resource('categories', CategoryController::class);

//             // Product
//             Route::resource('products', ProductController::class);

//             // Invoices
//             Route::get('/product/{id}', [InvoiceController::class, 'getProduct']);
//             Route::get('/price/{id}', [InvoiceController::class, 'getPrice']);
//             Route::post('Payment_status', [InvoiceController::class, 'payment_statusChange'])->name('Payment_status_change');
//             Route::resource('invoices', InvoiceController::class);


//     });


// // Auth
// require __DIR__.'/auth.php';



// });

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){

    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::get('/admin_dashboard', function () {
        return view('backend.admin_dashboard');
    })->middleware(['auth:admin'])->name('admin_dashboard');

    // categories
    Route::resource('categories',CategoryController::class);

    // products
    Route::resource('products', ProductController::class);

    // invoices
    Route::get('/product/{id}', [InvoiceController::class, 'getProduct']);
    Route::get('/price/{id}', [InvoiceController::class, 'getPrice']);
    Route::post('Payment_status', [InvoiceController::class, 'payment_statusChange'])->name('Payment_status_change');
    Route::resource('invoices', InvoiceController::class);

    // roles_permission
    Route::resource('roles', RoleController::class);
    // users_permission
    Route::resource('users', UserController::class);

    require __DIR__.'/auth.php';

});
