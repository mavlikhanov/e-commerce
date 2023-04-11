<?php
declare(strict_types=1);

namespace App\Modules\Customer\Application\Transformers;

use App\Shared\Api\EntityInterface;
use App\Shared\Parents\Transformers\AbstractTransformer;
use App\Shared\Parents\Transformers\TransformerInterface;

class CustomerTransformer extends AbstractTransformer implements TransformerInterface
{

    public function transformer(EntityInterface $entity): array
    {

    }
}
