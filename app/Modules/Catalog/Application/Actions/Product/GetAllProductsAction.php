<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Actions\Product;

use App\Modules\Catalog\Application\DataTransferObjects\ProductsRequestDto;
use App\Modules\Catalog\Application\Tasks\GetAllProductsTask;
use App\Modules\Catalog\Domain\Models\Collections\ProductCollection;

class GetAllProductsAction
{
    public function __construct(
        private readonly GetAllProductsTask $getAllProductsTask
    ) {}

    public function run(ProductsRequestDto $requestDto): ProductCollection
    {
        return $this->getAllProductsTask->run($requestDto);
    }
}
