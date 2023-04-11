<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Tasks;

use App\Modules\Catalog\Domain\Models\Entities\ProductEntity;
use App\Modules\Catalog\Domain\Models\Repositories\ProductRepositoryInterface;

class GetProductTask
{
    public function __construct(
        private readonly ProductRepositoryInterface $productRepository
    ) {}

    public function run(string $slug): ProductEntity
    {
        return $this->productRepository->findBySlug($slug);
    }
}
