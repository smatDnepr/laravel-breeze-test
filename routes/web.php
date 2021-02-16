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
	Route::resource('extra-data', App\Http\Controllers\Admin\ExtraDataController::class);
	Route::resource('partners', App\Http\Controllers\Admin\PartnerController::class);
	
	// Route::get('extra-data', [App\Http\Controllers\Admin\ExtraDataController::class, 'index'])->name('extra-data.index');
	// Route::get('extra-data/create', [App\Http\Controllers\Admin\ExtraDataController::class, 'create'])->name('extra-data.create');
	// Route::post('extra-data/store', [App\Http\Controllers\Admin\ExtraDataController::class, 'store'])->name('extra-data.store');
	
	// AJAX cортировка слайдов PromoSlide
	Route::get('sort-promo-slides', [App\Http\Controllers\Admin\SortPromoSlidesController::class, 'sortPromoSlides']);

});




