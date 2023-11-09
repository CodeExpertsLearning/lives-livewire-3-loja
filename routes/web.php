<?php

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

Route::view('/', 'welcome');


Route::prefix('manager')
    ->middleware('auth')
    ->name('manager.')
    ->namespace('App\Livewire\Manager')
    ->group(function () {

        Route::name('product.')
            ->prefix('products')
            ->namespace('Products')->group(function () {

                Route::get('/', ListProduct::class)->name('list');
                Route::get('/create', CreateProduct::class)->name('create');
                Route::get('/edit/{product}', EditProduct::class)->name('edit');
            });
    });





Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
