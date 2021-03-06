<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OutputProductController;
use App\Http\Controllers\Admin\PresentationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductEntryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BusinessPartnerController;
use App\Http\Controllers\Admin\NPaymentMethodController;
use App\Http\Controllers\Admin\VPaymentMethodController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');
Route::resource('tags', TagController::class)->except('show')->names('admin.tags');
Route::resource('presentations', PresentationController::class)->except('show')->names('admin.presentations');
Route::resource('products', ProductController::class)->names('admin.products');
Route::resource('product-entry', ProductEntryController::class)->names('admin.product-entry');
Route::get('stock', [ProductEntryController::class, 'stock'])->name('admin.product-entry.stock');
Route::resource('product-output', OutputProductController::class)->names('admin.product-output');
Route::resource('slider', SliderController::class)->names('admin.slider');
Route::resource('business-partners', BusinessPartnerController::class)->names('admin.business-partners');
Route::resource('banks', NPaymentMethodController::class)->names('admin.banks');
Route::resource('wallets', VPaymentMethodController::class)->names('admin.wallets');
