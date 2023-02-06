<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::get('femmes', [ProductController::class, 'femmes'])->name('product.femmes');
Route::get('hommes', [ProductController::class, 'hommes'])->name('product.hommes');
Route::get('soldes', [ProductController::class, 'soldes'])->name('product.soldes');
Route::get('detail/{product}', [ProductController::class, 'show'])->name('product.detail');
Route::get('admins', [ProductController::class, 'AllAdmin'])->name('admin.index');
Route::get('create', [ProductController::class, 'create'])->name('admin.create');
Route::post('store', [ProductController::class, 'store'])->name('admin.store');
Route::get('edit/{product}', [ProductController::class, 'edit'])->name('admin.edit');
Route::put('update/{product}', [ProductController::class, 'update'])->name('admin.update');
Route::delete('delete/{product}', [ProductController::class, 'destroy'])->name('admin.delete');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
