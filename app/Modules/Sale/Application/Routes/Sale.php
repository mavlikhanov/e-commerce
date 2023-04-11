<?php

use App\Modules\Sale\Application\Controllers\Api\AddToCartController;
use Illuminate\Support\Facades\Route;

Route::post('cart/items', AddToCartController::class);
