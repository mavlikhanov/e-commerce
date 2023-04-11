<?php

use App\Modules\Customer\Application\Controllers\Api\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('customer/login', LoginController::class);
