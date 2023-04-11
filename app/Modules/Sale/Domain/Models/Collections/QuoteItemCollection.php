<?php
declare(strict_types=1);

namespace App\Modules\Sale\Domain\Models\Collections;

use App\Modules\Sale\Domain\Models\Entities\QuoteItemEntity;
use App\Shared\Parents\Collections\AbstractCollection;

class QuoteItemCollection extends AbstractCollection
{
    public function getItemsCount(): int
    {
        return $this->count();
    }

    public function getItemsQty(): int
    {
        $itemsQty = 0;
        foreach ($this->items as $item) {
            /*** @var $item QuoteItemEntity */
            $itemsQty += $item->getQty();
        }
        return $itemsQty;
    }

    public function getSubtotal(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            /*** @var $item QuoteItemEntity */
            $total += $item->getPrice()->getValue();
        }
        return $total;
    }
}
