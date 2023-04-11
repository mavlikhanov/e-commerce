<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Controllers\Api\Category;

use App\Modules\Catalog\Application\Actions\Category\GetAllCategoriesAction;
use App\Modules\Catalog\Application\Transformers\CategoryTransformer;
use App\Shared\Parents\Controllers\AbstractApiController;
use Illuminate\Http\JsonResponse;

class GetAllCategoriesController extends AbstractApiController
{
    public function __construct(
        private readonly GetAllCategoriesAction $getAllCategoriesAction
    ) {}

    public function __invoke(): JsonResponse
    {
        $categories = $this->getAllCategoriesAction->run();
        return $this->transformFromCollection($categories, CategoryTransformer::class);
    }
}
