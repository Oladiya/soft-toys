<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', \App\Livewire\Home::class)
    ->name('home');

Route::prefix('products')
    ->name('products.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/', \App\Livewire\Products\Index::class)
            ->name('index');
        Route::get('/create', \App\Livewire\Products\Create::class)
            ->name('create');
        Route::get('/{product}/edit', \App\Livewire\Products\Edit::class)
            ->name('edit');
    });
Route::get('product/{product}', \App\Livewire\Products\Show::class)
    ->name('products.show');

Route::get('/login', \App\Livewire\Login::class)
    ->name('login');
Route::get('/register', \App\Livewire\Register::class)
    ->name('register');
Route::get('/cart', \App\Livewire\Cart::class)
    ->name('cart');

Route::prefix('orders')
    ->name('orders.')
    ->middleware(['auth'])
    ->group(function () {

        Route::get('/create', \App\Livewire\Orders\Create::class)
            ->name('create');
        Route::get('/', \App\Livewire\Orders\Index::class)
            ->middleware('admin')
            ->name('index');

    });
Route::get('/personal-account', \App\Livewire\PersonalAccount::class)
    ->middleware(['auth'])
    ->name('personal-account');
