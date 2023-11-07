<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::prefix('products')
    ->name('products.')
    ->group(function () {

        Route::get('/', \App\Livewire\Products\Index::class)
            ->name('index');
        Route::get('/create', \App\Livewire\Products\Create::class)
            ->name('create');
        Route::get('/{product}', \App\Livewire\Products\Show::class)
            ->name('show');
        Route::get('/{product}/edit', \App\Livewire\Products\Edit::class)
            ->name('edit');

    });
