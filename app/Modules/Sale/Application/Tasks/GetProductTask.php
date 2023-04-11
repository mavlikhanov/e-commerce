<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\Tasks;

use App\Modules\Catalog\Domain\Models\Entities\ProductEntity;
use App\Modules\Catalog\Domain\Models\Repositories\ProductRepositoryInterface;

class GetProductTask
{
    public function __construct(
        private readonly ProductRepositoryInterface $productRepository
    ) {}

    public function run(int $productId): ProductEntity
    {
        return $this->productRepository->findById($productId);
    }
}
