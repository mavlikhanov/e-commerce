<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Tests\Category;

trait EntityStructureTrait
{
    public function getStructure(): array
    {
        return [
            'id',
            'name',
            'slug',
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
