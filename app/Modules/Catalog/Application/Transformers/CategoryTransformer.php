<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Transformers;

use App\Modules\Catalog\Domain\Models\Entities\CategoryEntity;
use App\Shared\Api\EntityInterface;
use App\Shared\Parents\Transformers\AbstractTransformer;
use App\Shared\Parents\Transformers\TransformerInterface;

class CategoryTransformer extends AbstractTransformer implements TransformerInterface
{
    public function transformer(CategoryEntity|EntityInterface $entity): array
    {
        return [
            'id' => $entity->getId(),
            'name' => $entity->getName()->getValue(),
            'slug' => $entity->getSlug(),
            'h1' => $entity->getH1(),
            'seo' => [
                'seoTitle' => $entity->getSeoTitle(),
                'seoKeywords' => $entity->getSeoKeywords(),
                'seoDescription' => $entity->getSeoDescription(),
                'seoText' => $entity->getSeoText(),
            ],
            'createdAt' => $entity->getCreatedAt(),
            'updatedAt' => $entity->getUpdatedAt(),
        ];
    }
}
