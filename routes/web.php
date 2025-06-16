<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:web',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    require base_path('routes/admin.php');

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::middleware(['auth'])->prefix('chef')->group(function () {
    Route::get('/', [ChefController::class, 'index'])->name('chef.index');
    Route::post('/voorraad/{artikel}', [ChefController::class, 'updateVoorraad'])->name('chef.voorraad.update');
    Route::post('/bestelling/{order}/klaar', [ChefController::class, 'markeerAlsKlaar'])->name('chef.bestelling.klaar');
});
Route::middleware(['auth'])->prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::post('/{order}/add-dish', [OrderController::class, 'addDish'])->name('orders.add-dish');
});

Route::middleware(['auth'])->prefix('ingredients')->group(function () {
    Route::get('/', [IngredientController::class, 'index'])->name('ingredients.index');
});

Route::middleware(['auth'])->prefix('articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/store', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/{article}', [ArticleController::class, 'show'])->name('articles.show');
    Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

Route::middleware(['auth'])->prefix('dishes')->group(function () {
    Route::get('/', [DishController::class, 'index'])->name('dishes.index');
    Route::get('/create', [DishController::class, 'create'])->name('dishes.create');
    Route::post('/store', [DishController::class, 'store'])->name('dishes.store');
    Route::get('/{dish}/edit', [DishController::class, 'edit'])->name('dishes.edit');
    Route::put('/{dish}', [DishController::class, 'update'])->name('dishes.update');
    Route::delete('/{dish}', [DishController::class, 'destroy'])->name('dishes.destroy');
});

