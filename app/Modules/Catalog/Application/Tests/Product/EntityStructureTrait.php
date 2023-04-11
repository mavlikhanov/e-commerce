<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Tests\Product;

trait EntityStructureTrait
{
    public function getStructure(): array
    {
        return [
            'id',
            'name',
            'slug',
            'sku',
            'description',
            'price',
            'specialPrice',
            'photo',
            'category' => [
                'categoryId',
                'slug',
                'name'
            ],
            'h1',
            'seo' => [
                'seoTitle',
                'seoKeywords',
                'seoDescription',
                'seoText',
            ],
            'createdAt',
            'updatedAt',
        ];
    }
}
