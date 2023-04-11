<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Controllers\Api\Product;

use App\Modules\Catalog\Application\Actions\Product\GetProductAction;
use App\Modules\Catalog\Application\Transformers\ProductTransformer;
use App\Shared\Exceptions\RecordNotFoundException;
use App\Shared\Parents\Controllers\AbstractApiController;
use Illuminate\Http\JsonResponse;

class GetProductController extends AbstractApiController
{
    public function __construct(
        private readonly GetProductAction $getProductAction
    ) {}

    public function __invoke(string $slug): JsonResponse
    {
        try {
            return $this->tryProcess($slug);
        } catch (RecordNotFoundException $exception) {
            return response()->json(['error' => true, 'message' => $exception->getMessage()], $exception->getCode());
        }
    }

    private function tryProcess(string $slug): JsonResponse
    {
        $products = $this->getProductAction->run($slug);
        return $this->transformFromEntity($products, ProductTransformer::class);
    }

}
