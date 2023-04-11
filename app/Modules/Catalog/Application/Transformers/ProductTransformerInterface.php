<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Transformers;

use App\Modules\Catalog\Domain\Models\Entities\ProductEntity;

interface ProductTransformerInterface
{
    public function transformer(ProductEntity $entity): array;
}
