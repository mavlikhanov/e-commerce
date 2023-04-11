<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Domain\Models\EntityBuilders;

use App\Modules\Catalog\Domain\Models\Entities\ProductEntity;
use App\Shared\Api\EntityBuilderInterface;
use App\Shared\ValueObjects\Price;
use Carbon\Carbon;
use stdClass;

class ProductEntityBuilder implements EntityBuilderInterface
{
    public function getEntity(stdClass $item): ProductEntity
    {
        $productEntity = new ProductEntity(
            $item->name,
            $item->slug,
            $item->sku,
            $item->description,
            new Price($item->price),
            new Price($item->special_price),
            $item->photo,
            $item->category_id,
            $item->h1,
            $item->seo_title,
            $item->seo_keywords,
            $item->seo_text,
            $item->seo_text,
        );
        $productEntity->setId($item->id)
            ->setCreatedAt(Carbon::parse($item->created_at))
            ->setUpdatedAt(Carbon::parse($item->updated_at));

        if (isset($item->category_name)) {
            $productEntity->setCategoryName($item->category_name);
        }
        if (isset($item->category_slug)) {
            $productEntity->setCategorySlug($item->category_slug);
        }
        return $productEntity;
    }
}
