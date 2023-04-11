<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Actions\Category;

use App\Modules\Catalog\Application\Tasks\GetAllCategoriesTask;
use App\Modules\Catalog\Domain\Models\Collections\CategoryCollection;

class GetAllCategoriesAction
{
    public function __construct(
        private readonly GetAllCategoriesTask $getAllCategoriesTask
    ) {}

    public function run(): CategoryCollection
    {
        return $this->getAllCategoriesTask->run();
    }
}
