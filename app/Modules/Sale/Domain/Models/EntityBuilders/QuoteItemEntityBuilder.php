<?php
declare(strict_types=1);

namespace App\Modules\Sale\Domain\Models\EntityBuilders;

use App\Modules\Catalog\Domain\Models\Entities\ProductEntity;
use App\Modules\Sale\Domain\Models\Entities\QuoteItemEntity;
use App\Shared\ValueObjects\Price;
use Carbon\Carbon;
use stdClass;

class QuoteItemEntityBuilder
{
    public function getEntity(stdClass $item): QuoteItemEntity
    {
        $quoteItem = new QuoteItemEntity(
            $item->product_id,
            $item->qty,
        );
        $quoteItem->setId($item->id)
            ->setQuoteId($item->quote_id)
            ->setPrice(new Price($item->price))
            ->setProductName($item->product_name)
            ->setProductSku($item->product_sku)
            ->setCreatedAt(Carbon::parse($item->created_at))
            ->setUpdatedAt(Carbon::parse($item->updated_at))
            ->setProductPrice(new Price($item->price));

        return $quoteItem;
    }
}
