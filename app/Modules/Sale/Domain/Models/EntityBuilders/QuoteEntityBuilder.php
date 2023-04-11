<?php
declare(strict_types=1);

namespace App\Modules\Sale\Domain\Models\EntityBuilders;

use App\Modules\Sale\Domain\Models\Entities\QuoteEntity;
use App\Shared\ValueObjects\Price;
use stdClass;

class QuoteEntityBuilder
{
    public function getEntity(stdClass $item): QuoteEntity
    {
        $quote = new QuoteEntity();
        $quote->setId($item->id)
            ->setItemsCount($item->items_count)
            ->setItemsQty($item->items_qty)
            ->setSubtotal(new Price($item->subtotal));
        if ($item->customer_id) {
            $quote->setCustomerId($item->customer_id);
        }
        if ($item->customer_email) {
            $quote->setCustomerEmail($item->customer_email);
        }
        if ($item->customer_phone) {
            $quote->setCustomerPhone($item->customer_phone);
        }
        if ($item->customer_firstname) {
            $quote->setCustomerFirstname($item->customer_firstname);
        }
        if ($item->customer_lastname) {
            $quote->setCustomerLastname($item->customer_lastname);
        }
        if ($item->customer_middle_name) {
            $quote->setCustomerMiddleName($item->customer_middle_name);
        }
        if ($item->customer_address) {
            $quote->setCustomerMiddleName($item->customer_address);
        }
        return $quote;
    }
}
