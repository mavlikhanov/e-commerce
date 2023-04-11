<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Transformers;

use App\Modules\Catalog\Domain\Models\Entities\ProductEntity;
use App\Shared\Api\EntityInterface;
use App\Shared\Parents\Transformers\AbstractTransformer;
use App\Shared\Parents\Transformers\TransformerInterface;

class ProductTransformer extends AbstractTransformer implements TransformerInterface, ProductTransformerInterface
{
    /**
     * @param ProductEntity $entity
     * @return array
     */
    public function transformer(EntityInterface $entity): array
    {
        return [
            'id' => $entity->getId(),
            'name' => $entity->getName(),
            'slug' => $entity->getSlug(),
            'h1' => $entity->getH1(),
            'sku' => $entity->getSku(),
            'description' => $entity->getDescription(),
            'price' => $entity->getPrice()->getValue(),
            'specialPrice' => $entity->getSpecialPrice()->getValue(),
            'photo' => $entity->getPhoto(),
            'category' => [
                'categoryId' => $entity->getCategoryId(),
                'name' => $entity->getCategoryName(),
                'slug' => $entity->getCategorySlug()
            ],
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
