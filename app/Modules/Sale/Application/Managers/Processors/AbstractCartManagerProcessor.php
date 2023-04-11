<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\Managers\Processors;

use App\Modules\Catalog\Domain\Models\Entities\ProductEntity;
use App\Modules\Sale\Application\DataTransferObjects\AddToCartRequestDto;
use App\Modules\Sale\Domain\Models\Repositories\QuoteItemsRepositoryInterface;
use App\Modules\Sale\Domain\Models\Repositories\QuoteRepositoryInterface;
use App\Shared\ValueObjects\Price;

abstract class AbstractCartManagerProcessor implements ProcessorInterface
{
    protected AddToCartRequestDto $addToCartRequestDto;

    public function __construct(
        protected readonly QuoteRepositoryInterface $quoteRepository,
        protected readonly QuoteItemsRepositoryInterface $quoteItemsRepository,
    ) {}

    public function setCartDto(AddToCartRequestDto $addToCartRequestDto): ProcessorInterface
    {
        $this->addToCartRequestDto = $addToCartRequestDto;
        return $this;
    }

    protected function getProductPrice(ProductEntity $productEntity): Price
    {
        if ($productEntity->getSpecialPrice()->getValue()) {
            return $productEntity->getSpecialPrice();
        }
        return $productEntity->getPrice();
    }
}
