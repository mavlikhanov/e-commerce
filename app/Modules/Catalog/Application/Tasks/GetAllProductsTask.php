<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Tasks;

use App\Modules\Catalog\Application\DataTransferObjects\ProductsRequestDto;
use App\Modules\Catalog\Domain\Models\Collections\ProductCollection;
use App\Modules\Catalog\Domain\Models\Repositories\ProductRepositoryInterface;

class GetAllProductsTask
{
    public function __construct(
        private readonly ProductRepositoryInterface $productRepository
    ) {}

    public function run(ProductsRequestDto $requestDto): ProductCollection
    {
        $categoryId = $requestDto->getCategoryId();
        $paginateRequestDto = $requestDto->getPaginateRequestDto();

        if ($categoryId) {
            return $this->productRepository->getAllByCategoryId($paginateRequestDto, $categoryId);
        }
        return $this->productRepository->getAll($paginateRequestDto);
    }
}
