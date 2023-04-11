<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\Managers\Processors;

use App\Modules\Sale\Domain\Models\Entities\QuoteItemEntity;
use App\Shared\ValueObjects\Price;

class CreateNewCartProcessor extends AbstractCartManagerProcessor implements ProcessorInterface
{

    public function canProcess(): bool
    {
        return empty($this->addToCartRequestDto->getQuoteId());
    }

    public function process(): void
    {
        $product = $this->addToCartRequestDto->getProduct();

        $quote = $this->addToCartRequestDto->getCart();

        $itemCount = 1;
        $itemsQty = $this->addToCartRequestDto->getQty();
        $subtotal = $product->getPrice()->getValue() * $itemsQty;

        $quote->setItemsCount($itemCount)
            ->setItemsQty($itemsQty)
            ->setSubtotal(new Price((string)$subtotal));

        $this->quoteRepository->createQuote($quote);

        $quoteItems = new QuoteItemEntity(
            $this->addToCartRequestDto->getProductId(),
            $itemsQty
        );
        $quoteItems->setQuoteId($quote->getId())
            ->setPrice($this->getProductPrice($product))
            ->setProductName($product->getName())
            ->setProductSku($product->getSku());

        $this->quoteItemsRepository->createItem($quoteItems);
        $quote->getItemsCollection();
    }
}
