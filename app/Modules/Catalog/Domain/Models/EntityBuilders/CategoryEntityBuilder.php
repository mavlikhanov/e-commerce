<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Domain\Models\EntityBuilders;

use App\Modules\Catalog\Domain\Models\Entities\CategoryEntity;
use App\Modules\Catalog\Domain\ValueObjects\CategoryName;
use Carbon\Carbon;
use stdClass;

class CategoryEntityBuilder
{
    public function getEntity(stdClass $item): CategoryEntity
    {
        $categoryEntity = new CategoryEntity(
            new CategoryName($item->name),
            $item->slug,
            $item->h1,
            $item->seo_title,
            $item->seo_keywords,
            $item->seo_description,
            $item->seo_text,
        );
        $categoryEntity->setId($item->id)
            ->setCreatedAt(Carbon::parse($item->created_at))
            ->setUpdatedAt(Carbon::parse($item->updated_at));
        return $categoryEntity;
    }
}
