<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Guest\DashboardController as GuestDashboardController;
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

Route::get('/', [GuestDashboardController::class, 'index'])->name('guest.dashboard');;

Auth::routes();

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');
        Route::get('/bin', [DashboardController::class, 'trashed'])
            ->name('trashed');
        Route::get('/create', [DashboardController::class, 'create'])
            ->name('create');
        Route::post('/', [DashboardController::class, 'store'])
            ->name('store');
        Route::delete('/deleted/{project}', [DashboardController::class, 'destroy'])
            ->name('destroy');
        Route::put('/update/{project}', [DashboardController::class, 'update'])
            ->name('update');
        Route::delete('/restore/{project}', [DashboardController::class, 'restore'])
            ->name('restore');
        Route::delete('/{project}', [DashboardController::class, 'forceDelete'])
            ->name('forceDelete');
        Route::get('/project/{project}', [DashboardController::class, 'show'])
            ->name('show');
        Route::get('/project/{project}/edit', [DashboardController::class, 'edit'])
            ->name('edit');
    });
