<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RentalController;
use GuzzleHttp\Middleware;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('redirects', 'App\Http\Controllers\HomeController@index');

Route::get('/catalog', [CatalogController::class, 'index'])->middleware('auth')->name('catalog');
Route::get('/about', [AboutController::class, 'index'])->middleware('auth')->name('about');
Route::get('/redirects', [AdminController::class, 'index'])->middleware('auth')->name('redirects');
Route::get('/book', [AdminController::class, 'book'])->middleware('auth')->name('book');
Route::get('/pelanggan', [AdminController::class, 'pelanggan'])->middleware('auth')->name('pelanggan');
Route::get('/bp', [AdminController::class, 'bp'])->Middleware('auth')->name('bp');
Route::post('/rentals', [RentalController::class, 'store'])->name('rentals.store');
Route::get('/catalog/{buku}/confirm-rental', [RentalController::class, 'showConfirmation'])
    ->middleware('auth') // Assuming authentication is required
    ->name('rentals.showConfirmation');
Route::get('/catalog', [CatalogController::class, 'index'])->middleware('auth')->name('catalog.index');

Route::get('/admin/logout', [AdminController::class, 'logout'])->Middleware('auth')->name('admin.logout');



