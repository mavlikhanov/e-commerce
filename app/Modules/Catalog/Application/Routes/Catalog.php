<?php

use App\Modules\Catalog\Application\Controllers\Api\Category\GetAllCategoriesController;
use App\Modules\Catalog\Application\Controllers\Api\Category\GetCategoryController;
use App\Modules\Catalog\Application\Controllers\Api\Product\GetAllProductsController;
use App\Modules\Catalog\Application\Controllers\Api\Product\GetProductController;
use Illuminate\Support\Facades\Route;

Route::get('categories', GetAllCategoriesController::class);
Route::get('category/{slug}', GetCategoryController::class);

Route::get('products', GetAllProductsController::class);
Route::get('product/{slug}', GetProductController::class);
