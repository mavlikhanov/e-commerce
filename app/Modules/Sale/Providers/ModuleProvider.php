<?php
declare(strict_types=1);

namespace App\Modules\Sale\Providers;

use App\Modules\Sale\Domain\Models\Repositories\QuoteItemsRepositoryInterface;
use App\Modules\Sale\Domain\Models\Repositories\QuoteRepositoryInterface;
use App\Modules\Sale\Infrastructure\Repositories\QuoteItemsRepository;
use App\Modules\Sale\Infrastructure\Repositories\QuoteRepository;
use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            QuoteRepositoryInterface::class,
            QuoteRepository::class
        );
        $this->app->bind(
            QuoteItemsRepositoryInterface::class,
            QuoteItemsRepository::class
        );
    }
}
