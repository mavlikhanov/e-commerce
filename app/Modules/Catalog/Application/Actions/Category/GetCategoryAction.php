<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Actions\Category;

use App\Modules\Catalog\Application\Tasks\GetCategoryTask;
use App\Modules\Catalog\Domain\Models\Entities\CategoryEntity;

class GetCategoryAction
{
    public function __construct(
        private readonly GetCategoryTask $getCategoryTask
    ) {}

    public function run(string $slug): CategoryEntity
    {
        return $this->getCategoryTask->run($slug);
    }
}
