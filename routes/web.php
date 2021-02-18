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
	
	Route::resource('partners', App\Http\Controllers\Admin\PartnerController::class);
	Route::resource('extra-data', App\Http\Controllers\Admin\ExtraDataController::class);
	
	Route::resource('landing/promo-slides', App\Http\Controllers\Admin\LandingPromoSlidesController::class, ['names' => 'landing.promo-slides']);
	
	Route::get('landing/about', [App\Http\Controllers\Admin\LandingController::class, 'aboutEdit'])->name('landing.about.edit');
	Route::put('landing/about', [App\Http\Controllers\Admin\LandingController::class, 'aboutUpdate'])->name('landing.about.update');
	
	Route::get('landing/info-slider', [App\Http\Controllers\Admin\LandingController::class, 'infoSliderShow'])->name('landing.info-slider.show');
	Route::get('landing/info-slider/edit', [App\Http\Controllers\Admin\LandingController::class, 'infoSliderEdit'])->name('landing.info-slider.edit');
	Route::put('landing/info-slider', [App\Http\Controllers\Admin\LandingController::class, 'infoSliderUpdate'])->name('landing.info-slider.update');
	
	Route::resource('landing/info-slides', App\Http\Controllers\Admin\LandingInfoSlidesController::class, ['names' => 'landing.info-slides']);
	
	
	
	
	
	
	// Route::get('extra-data', [App\Http\Controllers\Admin\ExtraDataController::class, 'index'])->name('extra-data.index');
	// Route::get('extra-data/create', [App\Http\Controllers\Admin\ExtraDataController::class, 'create'])->name('extra-data.create');
	// Route::post('extra-data/store', [App\Http\Controllers\Admin\ExtraDataController::class, 'store'])->name('extra-data.store');
	
	// AJAX cортировка слайдов
	Route::post('sort-promo-slides', [App\Http\Controllers\Admin\SortPromoSlidesController::class, 'sortSlides'])->name('landing.sort-promo-slides');
	Route::post('sort-info-slides', [App\Http\Controllers\Admin\SortInfoSlidesController::class, 'sortSlides'])->name('landing.sort-info-slides');

});




