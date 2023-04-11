<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Infrastructure\Repositories;

use App\Modules\Catalog\Domain\Api\CategoryInterface;
use App\Modules\Catalog\Domain\Models\Collections\CategoryCollection;
use App\Modules\Catalog\Domain\Models\Entities\CategoryEntity;
use App\Modules\Catalog\Domain\Models\EntityBuilders\CategoryEntityBuilder;
use App\Modules\Catalog\Domain\Models\Repositories\CategoryRepositoryInterface;
use App\Shared\Api\HttpStatusCodeInterface;
use App\Shared\Exceptions\RecordNotFoundException;
use Illuminate\Support\Facades\DB;
use stdClass;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(
        private readonly CategoryEntityBuilder $categoryEntityBuilder
    ) {}

    public function getAll(): CategoryCollection
    {
        $categories = DB::table(CategoryInterface::TABLE_NAME)
            ->get()
            ->map(fn (stdClass $item) => $this->categoryEntityBuilder->getEntity($item));
        return new CategoryCollection($categories->toArray());
    }

    /**
     * @throws RecordNotFoundException
     */
    public function findBySlug(string $slug): CategoryEntity
    {
        $item = DB::table(CategoryInterface::TABLE_NAME)
            ->where(CategoryInterface::SLUG, '=', $slug)
            ->first();
        if (!$item) {
            throw new RecordNotFoundException("Запись с slug $slug не найдена", HttpStatusCodeInterface::NOT_FOUND);
        }
        return $this->categoryEntityBuilder->getEntity($item);
    }
}
