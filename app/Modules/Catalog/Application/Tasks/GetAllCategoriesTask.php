<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Tasks;

use App\Modules\Catalog\Domain\Models\Collections\CategoryCollection;
use App\Modules\Catalog\Domain\Models\Repositories\CategoryRepositoryInterface;

class GetAllCategoriesTask
{
    public function __construct(
        private readonly CategoryRepositoryInterface $categoryRepository
    ) {}

    public function run(): CategoryCollection
    {
        return $this->categoryRepository->getAll();
    }
}
