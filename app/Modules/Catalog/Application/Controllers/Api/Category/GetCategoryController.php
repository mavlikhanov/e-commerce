<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Controllers\Api\Category;

use App\Modules\Catalog\Application\Actions\Category\GetCategoryAction;
use App\Modules\Catalog\Application\Transformers\CategoryTransformer;
use App\Shared\Exceptions\RecordNotFoundException;
use App\Shared\Parents\Controllers\AbstractApiController;
use Illuminate\Http\JsonResponse;

class GetCategoryController extends AbstractApiController
{
    public function __construct(
        private readonly GetCategoryAction $getCategoryAction
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
        $category = $this->getCategoryAction->run($slug);
        return $this->transformFromEntity($category, CategoryTransformer::class);
    }
}
