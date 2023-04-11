<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Controllers\Api\Product;

use App\Modules\Catalog\Application\Actions\Product\GetAllProductsAction;
use App\Modules\Catalog\Application\Requests\GetProductsRequest;
use App\Modules\Catalog\Application\Transformers\ProductTransformer;
use App\Shared\Parents\Controllers\AbstractApiController;
use Illuminate\Http\JsonResponse;

class GetAllProductsController extends AbstractApiController
{
    public function __construct(
        private readonly GetAllProductsAction $getAllProductsAction
    ) {}

    public function __invoke(GetProductsRequest $request): JsonResponse
    {
        $requestDto = $request->toDto();
        $products = $this->getAllProductsAction->run($requestDto);
        return $this->transformFromCollection($products, ProductTransformer::class);
    }
}
