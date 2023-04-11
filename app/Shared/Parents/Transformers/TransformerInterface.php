<?php
declare(strict_types=1);

namespace App\Shared\Parents\Transformers;

use App\Shared\Api\EntityInterface;

interface TransformerInterface
{
    public function transformer(EntityInterface $entity): array;
}
