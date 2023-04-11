<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Providers;

use App\Modules\Catalog\Application\Transformers\ProductTransformer;
use App\Modules\Catalog\Application\Transformers\ProductTransformerInterface;
use App\Modules\Catalog\Domain\Models\Repositories\CategoryRepositoryInterface;
use App\Modules\Catalog\Domain\Models\Repositories\ProductRepositoryInterface;
use App\Modules\Catalog\Infrastructure\Repositories\CategoryRepository;
use App\Modules\Catalog\Infrastructure\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class ModuleProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
        $this->app->bind(
            ProductTransformerInterface::class,
            ProductTransformer::class
        );
    }
}
