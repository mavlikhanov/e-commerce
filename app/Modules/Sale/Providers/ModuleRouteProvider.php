<?php
declare(strict_types=1);

namespace App\Modules\Sale\Providers;

use App\Shared\Parents\Providers\AbstractRouteProvider;
use Illuminate\Support\Facades\Route;

class ModuleRouteProvider extends AbstractRouteProvider
{
    public function boot(): void
    {
        $this->configureRateLimiting();
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group($this->getRouteGroup('Sale'));
        });
    }
}
