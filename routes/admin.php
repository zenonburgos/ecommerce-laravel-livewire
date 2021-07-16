<?php

use App\Http\Livewire\Admin\CreateProduct;
use App\Http\Livewire\Admin\ShowProducts;
use App\Http\Livewire\Admin\EditProduct;

use Illuminate\Support\Facades\Route;

Route::get('/', ShowProducts::class)->name('admin.index');

Route::get('products/create', CreateProduct::class)->name('admin.products.create');

Route::get('products/{product}/edit', EditProduct::class)->name('admin.products.edit');