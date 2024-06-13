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
Route::get('/admin/transaksi', [AdminController::class, 'transaksi'])->name('transaksi'); // Updated route
Route::post('/rentals', [RentalController::class, 'store'])->name('rentals.store');
Route::get('/catalog/{buku}/confirm-rental', [RentalController::class, 'showConfirmation'])
    ->middleware('auth') // Assuming authentication is required
    ->name('rentals.showConfirmation');
Route::get('/catalog', [CatalogController::class, 'index'])->middleware('auth')->name('catalog.index');

Route::get('/admin/logout', [AdminController::class, 'logout'])->Middleware('auth')->name('admin.logout');
Route::get('/pelanggan', [AdminController::class, 'showCustomers'])->name('pelanggan');


// CRUD routes for Buku
Route::get('/admin/books', [AdminController::class, 'book'])->name('books.index');
Route::get('/admin/books/create', [AdminController::class, 'create'])->name('books.create');
Route::post('/admin/books', [AdminController::class, 'store'])->name('books.store');
Route::get('/admin/books/{buku}/edit', [AdminController::class, 'edit'])->name('books.edit');
Route::put('/admin/books/{buku}', [AdminController::class, 'update'])->name('books.update');
Route::delete('/admin/books/{buku}', [AdminController::class, 'destroy'])->name('books.destroy');

Route::prefix('admin')->group(function () {
    Route::get('/books', [AdminController::class, 'book'])->name('books.index');
    Route::get('/books/create', [AdminController::class, 'create'])->name('books.create');
    Route::post('/books', [AdminController::class, 'store'])->name('books.store');
    Route::get('/books/{buku}/edit', [AdminController::class, 'edit'])->name('books.edit');
    Route::put('/books/{buku}', [AdminController::class, 'update'])->name('books.update');
    Route::delete('/books/{buku}', [AdminController::class, 'destroy'])->name('books.destroy');
});

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/pelanggan', [AdminController::class, 'indexPelanggan'])->name('pelanggan.index');
        Route::get('/pelanggan/create', [AdminController::class, 'createPelanggan'])->name('pelanggan.create');
        Route::post('/pelanggan/store', [AdminController::class, 'storePelanggan'])->name('pelanggan.store');
        Route::get('/pelanggan/{id}/edit', [AdminController::class, 'editPelanggan'])->name('pelanggan.edit');
        Route::put('/pelanggan/{id}/update', [AdminController::class, 'updatePelanggan'])->name('pelanggan.update');
        Route::delete('/pelanggan/{id}/delete', [AdminController::class, 'deletePelanggan'])->name('pelanggan.destroy');
    });
});
