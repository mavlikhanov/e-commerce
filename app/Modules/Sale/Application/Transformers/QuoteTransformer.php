<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\Transformers;

use App\Modules\Sale\Domain\Models\Collections\QuoteItemCollection;
use App\Modules\Sale\Domain\Models\Entities\QuoteEntity;
use App\Shared\Api\EntityInterface;
use App\Shared\Parents\Transformers\AbstractTransformer;
use App\Shared\Parents\Transformers\TransformerInterface;

class QuoteTransformer extends AbstractTransformer implements TransformerInterface
{
    public function transformer(QuoteEntity|EntityInterface $entity): array
    {
        return [
            'quoteId' => $entity->getId(),
            'itemsCount' => $entity->getItemsCount(),
            'itemsQty' => $entity->getItemsQty(),
            'subtotal' => $entity->getSubtotal()->getValue(),
            'items' => $this->getItems($entity->getItemsCollection())
        ];
    }

    private function getItems(QuoteItemCollection $itemCollection): array
    {
        $result = [];
        foreach ($itemCollection as $item) {
            $result[] = [
                'itemId' => $item->getId(),
                'price' => $item->getPrice()->getValue(),
                'specialPrice' => $item->getProductSpecialPrice()->getValue(),
                'name' => $item->getProductName(),
                'sku' => $item->getProductSku(),
                'slug' => $item->getProductSlug(),
                'photo' => $item->getProductPhoto(),
                'productId' => $item->getProductId(),
                'qty' => $item->getQty(),
            ];
        }
        return $result;
    }
}
