<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
	return view('welcome');
});


Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__ . '/auth.php';


Route::prefix('admin')->middleware(['role:administrator'])->group(function () {
	Route::get('/', [App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.index');
	Route::get('editor', [App\Http\Controllers\Admin\MainController::class, 'editor'])->name('admin.editor');
	Route::get('file-upload', [App\Http\Controllers\Admin\MainController::class, 'fileUpload'])->name('admin.fileUpload');
	Route::get('file-manager', [App\Http\Controllers\Admin\MainController::class, 'fileManager'])->name('admin.fileManager');
	Route::resource('promo-slides', App\Http\Controllers\Admin\PromoSlideController::class);
	
	// AJAX cортировка слайдов PromoSlide
	Route::get('sort-promo-slides', [App\Http\Controllers\Admin\SortPromoSlidesController::class, 'sortPromoSlides']);

});




