<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Domain\Models\Collections;

use App\Modules\Catalog\Domain\Models\EntityBuilders\ProductEntityBuilder;
use App\Shared\Parents\Collections\AbstractPaginateCollection;
use ArrayAccess;
use Countable;
use IteratorAggregate;

class ProductCollection extends AbstractPaginateCollection implements ArrayAccess, Countable, IteratorAggregate
{
    protected function getEntityBuilder(): string
    {
        return ProductEntityBuilder::class;
    }
}
