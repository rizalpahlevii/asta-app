<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FranchiseController;
use App\Http\Controllers\Admin\FranchiseTypeController;
use App\Http\Controllers\Admin\UserController;
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

Route::name('admin.')->middleware('auth')->prefix('backoffice')->group(function ($app) {
    $app->get('/', [DashboardController::class, 'index'])->name('dashboard');
    $app->prefix('franchises')->name('franchise.')->group(function ($app) {

        $app->prefix('types')->name('type.')->group(function ($app) {
            $app->get('/', [FranchiseTypeController::class, 'index'])->name('index');
            $app->get('/create', [FranchiseTypeController::class, 'create'])->name('create');
            $app->post('/', [FranchiseTypeController::class, 'store'])->name('store');
            $app->get('/{id}/edit', [FranchiseTypeController::class, 'edit'])->name('edit');
            $app->put('/{id}', [FranchiseTypeController::class, 'update'])->name('update');
            $app->get('/{id}/delete', [FranchiseTypeController::class, 'destroy'])->name('destroy');
        });

        $app->get('/', [FranchiseController::class, 'index'])->name('index');
        $app->get('/create', [FranchiseController::class, 'create'])->name('create');
        $app->post('/', [FranchiseController::class, 'store'])->name('store');
        $app->get('/{id}/edit', [FranchiseController::class, 'edit'])->name('edit');
        $app->put('/{id}', [FranchiseController::class, 'update'])->name('update');
        $app->get('/{id}/delete', [FranchiseController::class, 'destroy'])->name('destroy');
    });
    $app->prefix('users')->name('user.')->group(function ($app) {
        $app->get('/', [UserController::class, 'index'])->name('index');
        $app->get('/create', [UserController::class, 'create'])->name('create');
        $app->post('/', [UserController::class, 'store'])->name('store');
        $app->get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
        $app->put('/{id}', [UserController::class, 'update'])->name('update');
        $app->get('/{id}/delete', [UserController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__ . '/auth.php';
