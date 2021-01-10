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

Route::get('/', function () {
    return view('welcome');
});

Route::name('franchise.')->middleware('auth')->prefix('franchise')->group(function ($app) {
    $app->get('/', [App\Http\Controllers\Franchise\DashboardController::class, 'index'])->name('dashboard');
    $app->get('/dashboard', [App\Http\Controllers\Franchise\DashboardController::class, 'index'])->name('dashboard');

    $app->prefix('orders')->name('order.')->group(function ($app) {
    });
    $app->prefix('vouchers')->name('voucher.')->group(function ($app) {
        $app->get('/', [App\Http\Controllers\Franchise\VoucherController::class, 'index'])->name('index');
        $app->get('/create', [App\Http\Controllers\Franchise\VoucherController::class, 'create'])->name('create');
        $app->post('/', [App\Http\Controllers\Franchise\VoucherController::class, 'store'])->name('store');
        $app->get('/{id}/edit', [App\Http\Controllers\Franchise\VoucherController::class, 'edit'])->name('edit');
        $app->put('/{id}', [App\Http\Controllers\Franchise\VoucherController::class, 'update'])->name('update');
        $app->get('/{id}/delete', [App\Http\Controllers\Franchise\VoucherController::class, 'destroy'])->name('destroy');
    });
    $app->prefix('categories')->name('category.')->group(function ($app) {
        $app->get('/', [App\Http\Controllers\Franchise\CategoryController::class, 'index'])->name('index');
        $app->get('/create', [App\Http\Controllers\Franchise\CategoryController::class, 'create'])->name('create');
        $app->post('/', [App\Http\Controllers\Franchise\CategoryController::class, 'store'])->name('store');
        $app->get('/{id}/edit', [App\Http\Controllers\Franchise\CategoryController::class, 'edit'])->name('edit');
        $app->put('/{id}', [App\Http\Controllers\Franchise\CategoryController::class, 'update'])->name('update');
        $app->get('/{id}/delete', [App\Http\Controllers\Franchise\CategoryController::class, 'destroy'])->name('destroy');
    });
    $app->prefix('suppliers')->name('supplier.')->group(function ($app) {
        $app->get('/', [App\Http\Controllers\Franchise\SupplierController::class, 'index'])->name('index');
        $app->get('/create', [App\Http\Controllers\Franchise\SupplierController::class, 'create'])->name('create');
        $app->post('/', [App\Http\Controllers\Franchise\SupplierController::class, 'store'])->name('store');
        $app->get('/{id}/edit', [App\Http\Controllers\Franchise\SupplierController::class, 'edit'])->name('edit');
        $app->put('/{id}', [App\Http\Controllers\Franchise\SupplierController::class, 'update'])->name('update');
        $app->get('/{id}/delete', [App\Http\Controllers\Franchise\SupplierController::class, 'destroy'])->name('destroy');
    });
    $app->prefix('materials')->name('material.')->group(function ($app) {
        $app->get('/', [App\Http\Controllers\Franchise\RawMaterialController::class, 'index'])->name('index');
        $app->get('/create', [App\Http\Controllers\Franchise\RawMaterialController::class, 'create'])->name('create');
        $app->post('/', [App\Http\Controllers\Franchise\RawMaterialController::class, 'store'])->name('store');
        $app->get('/{id}/edit', [App\Http\Controllers\Franchise\RawMaterialController::class, 'edit'])->name('edit');
        $app->put('/{id}', [App\Http\Controllers\Franchise\RawMaterialController::class, 'update'])->name('update');
        $app->get('/{id}/delete', [App\Http\Controllers\Franchise\RawMaterialController::class, 'destroy'])->name('destroy');
    });
    $app->prefix('products')->name('product.')->group(function ($app) {
        $app->get('/', [App\Http\Controllers\Franchise\ProductController::class, 'index'])->name('index');
        $app->get('/create', [App\Http\Controllers\Franchise\ProductController::class, 'create'])->name('create');
        $app->post('/', [App\Http\Controllers\Franchise\ProductController::class, 'store'])->name('store');
        $app->get('/{id}/edit', [App\Http\Controllers\Franchise\ProductController::class, 'edit'])->name('edit');
        $app->put('/{id}', [App\Http\Controllers\Franchise\ProductController::class, 'update'])->name('update');
        $app->get('/{id}/delete', [App\Http\Controllers\Franchise\ProductController::class, 'destroy'])->name('destroy');
    });
});

Route::name('admin.')->middleware('auth')->prefix('backoffice')->group(function ($app) {
    $app->get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    $app->get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    $app->prefix('franchises')->name('franchise.')->group(function ($app) {

        $app->prefix('types')->name('type.')->group(function ($app) {
            $app->get('/', [App\Http\Controllers\Admin\FranchiseTypeController::class, 'index'])->name('index');
            $app->get('/create', [App\Http\Controllers\Admin\FranchiseTypeController::class, 'create'])->name('create');
            $app->post('/', [App\Http\Controllers\Admin\FranchiseTypeController::class, 'store'])->name('store');
            $app->get('/{id}/edit', [App\Http\Controllers\Admin\FranchiseTypeController::class, 'edit'])->name('edit');
            $app->put('/{id}', [App\Http\Controllers\Admin\FranchiseTypeController::class, 'update'])->name('update');
            $app->get('/{id}/delete', [App\Http\Controllers\Admin\FranchiseTypeController::class, 'destroy'])->name('destroy');
        });

        $app->get('/', [App\Http\Controllers\Admin\FranchiseController::class, 'index'])->name('index');
        $app->get('/create', [App\Http\Controllers\Admin\FranchiseController::class, 'create'])->name('create');
        $app->post('/', [App\Http\Controllers\Admin\FranchiseController::class, 'store'])->name('store');
        $app->get('/{id}/edit', [App\Http\Controllers\Admin\FranchiseController::class, 'edit'])->name('edit');
        $app->put('/{id}', [App\Http\Controllers\Admin\FranchiseController::class, 'update'])->name('update');
        $app->get('/{id}/delete', [App\Http\Controllers\Admin\FranchiseController::class, 'destroy'])->name('destroy');
    });
    $app->prefix('users')->name('user.')->group(function ($app) {
        $app->get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
        $app->get('/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');
        $app->post('/', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');
        $app->get('/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit');
        $app->put('/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('update');
        $app->get('/{id}/delete', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('destroy');
    });
    $app->prefix('suppliers')->name('supplier.')->group(function ($app) {
        $app->get('/', [App\Http\Controllers\Admin\SupplierController::class, 'index'])->name('index');
        $app->get('/create', [App\Http\Controllers\Admin\SupplierController::class, 'create'])->name('create');
        $app->post('/', [App\Http\Controllers\Admin\SupplierController::class, 'store'])->name('store');
        $app->get('/{id}/edit', [App\Http\Controllers\Admin\SupplierController::class, 'edit'])->name('edit');
        $app->put('/{id}', [App\Http\Controllers\Admin\SupplierController::class, 'update'])->name('update');
        $app->get('/{id}/delete', [App\Http\Controllers\Admin\SupplierController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__ . '/auth.php';
