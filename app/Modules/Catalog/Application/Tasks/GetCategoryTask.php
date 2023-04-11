<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Tasks;

use App\Modules\Catalog\Domain\Models\Entities\CategoryEntity;
use App\Modules\Catalog\Domain\Models\Repositories\CategoryRepositoryInterface;

class GetCategoryTask
{
    public function __construct(
        private readonly CategoryRepositoryInterface $categoryRepository
    ) {}

    public function run(string $slug): CategoryEntity
    {
        return $this->categoryRepository->findBySlug($slug);
    }
}
