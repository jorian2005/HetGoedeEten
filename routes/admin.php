<?php

use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Admin\RoleController;

Route::middleware(['auth', 'can:manage users'])->prefix('admin')->group(function () {
    Route::get('/users', [UserRoleController::class, 'index'])->name('admin.users.index');
    Route::post('/users/{user}/roles', [UserRoleController::class, 'update'])->name('admin.users.update');
    Route::put('/users/{user}/roles', [UserRoleController::class, 'update'])->name('admin.users.update.put');
    Route::get('/users/{user}/roles/edit', [UserRoleController::class, 'edit'])->name('admin.users.edit');
    Route::delete('/users/{user}/roles', [UserRoleController::class, 'destroy'])->name('admin.users.destroy');
});

Route::middleware(['auth', 'can:manage roles'])->prefix('admin')->group(function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('admin.roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('admin.roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('admin.roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit');
    Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('admin.roles.update');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('settings', [SettingController::class, 'edit'])->name('admin.settings.edit');
    Route::post('settings', [SettingController::class, 'update'])->name('admin.settings.update');
});


