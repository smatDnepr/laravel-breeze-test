<?php

//use App\Http\Controllers\Admin\PromoSlideController;
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



Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/admin/promo-slides/sortSlides', [App\Http\Controllers\Admin\SortPromoSlidesController::class, 'sortSlides']);

Route::prefix('admin')->middleware(['role:administrator'])->group(function () {
	Route::get('/', [App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.index');
	Route::get('editor', [App\Http\Controllers\Admin\MainController::class, 'editor'])->name('admin.editor');
	Route::get('file-upload', [App\Http\Controllers\Admin\MainController::class, 'fileUpload'])->name('admin.fileUpload');
	Route::get('file-manager', [App\Http\Controllers\Admin\MainController::class, 'fileManager'])->name('admin.fileManager');
	Route::resource('promo-slides', App\Http\Controllers\Admin\PromoSlideController::class);
	
	// Сортировка слайдов PromoSlide
	Route::get('sort-promo-slides', [App\Http\Controllers\Admin\SortPromoSlidesController::class, 'sortPromoSlides']);
});



