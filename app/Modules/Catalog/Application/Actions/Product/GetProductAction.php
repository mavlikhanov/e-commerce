<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Actions\Product;

use App\Modules\Catalog\Application\Tasks\GetProductTask;
use App\Modules\Catalog\Domain\Models\Entities\ProductEntity;

class GetProductAction
{
    public function __construct(
        private readonly GetProductTask $getProductTask
    ) {}

    public function run(string $slug): ProductEntity
    {
        return $this->getProductTask->run($slug);
    }
}
