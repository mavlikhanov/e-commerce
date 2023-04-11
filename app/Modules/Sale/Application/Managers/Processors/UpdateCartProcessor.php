<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\Managers\Processors;

use App\Modules\Sale\Domain\Api\QuoteInterface;
use App\Modules\Sale\Domain\Models\Entities\QuoteItemEntity;
use App\Shared\Exceptions\RecordNotFoundException;
use App\Shared\ValueObjects\Price;

class UpdateCartProcessor extends AbstractCartManagerProcessor implements ProcessorInterface
{

    public function canProcess(): bool
    {
        return !empty($this->addToCartRequestDto->getQuoteId());
    }

    public function process(): void
    {
        $productId = $this->addToCartRequestDto->getProductId();
        $quoteId = $this->addToCartRequestDto->getQuoteId();

        $product = $this->addToCartRequestDto->getProduct();
        $quote = $this->addToCartRequestDto->getCart();

        try {
            $existQuoteItem = $this->quoteItemsRepository->getExistItem($quoteId, $productId);
            $existQuoteItem->setQty($existQuoteItem->getQty() + $this->addToCartRequestDto->getQty());

            $this->quoteItemsRepository->updateQty($existQuoteItem->getId(), $existQuoteItem->getQty());
            $quote->setItemsQty(
                $quote->getItemsQty() + $this->addToCartRequestDto->getQty()
            );
        } catch (RecordNotFoundException $exception) {
            $quoteItems = new QuoteItemEntity(
                $productId,
                $this->addToCartRequestDto->getQty()
            );

            $quoteItems->setQuoteId($quote->getId())
                ->setPrice($this->getProductPrice($product))
                ->setProductName($product->getName())
                ->setProductSku($product->getSku());

            $this->quoteItemsRepository->createItem($quoteItems);
            $quote->setItemsCount($quote->getItemsCount() + 1);
            $quote->setItemsQty($quote->getItemsQty() + $this->addToCartRequestDto->getQty());
        }


        $requestSubtotal = $product->getPrice()->getValue() * $this->addToCartRequestDto->getProductId();
        $total = $quote->getSubtotal()->getValue() + $requestSubtotal;
        $quote->setSubtotal(new Price((string)$total));

        $this->quoteRepository->update(
            $quoteId,
            [
                QuoteInterface::ITEMS_COUNT => $quote->getItemsCount(),
                QuoteInterface::ITEMS_QTY => $quote->getItemsQty(),
                QuoteInterface::SUBTOTAL => $quote->getSubtotal()->getValue()
            ]
        );
    }
}
