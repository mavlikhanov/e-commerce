<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\DataTransferObjects;

use App\Modules\Catalog\Domain\Models\Entities\ProductEntity;
use App\Modules\Sale\Domain\Models\Entities\QuoteEntity;

class AddToCartRequestDto
{
    private ?int $quoteId = null;

    private QuoteEntity $cart;
    private ProductEntity $product;

    public function __construct(
        private readonly int $productId,
        private readonly int $qty
    ) {}

    /**
     * @return int|null
     */
    public function getQuoteId(): ?int
    {
        return $this->quoteId;
    }

    /**
     * @param int|null $quoteId
     * @return AddToCartRequestDto
     */
    public function setQuoteId(?int $quoteId): AddToCartRequestDto
    {
        $this->quoteId = $quoteId;
        return $this;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @return int
     */
    public function getQty(): int
    {
        return $this->qty;
    }

    /**
     * @return QuoteEntity
     */
    public function getCart(): QuoteEntity
    {
        return $this->cart;
    }

    /**
     * @param QuoteEntity $cart
     * @return AddToCartRequestDto
     */
    public function setCart(QuoteEntity $cart): AddToCartRequestDto
    {
        $this->cart = $cart;
        return $this;
    }

    /**
     * @return ProductEntity
     */
    public function getProduct(): ProductEntity
    {
        return $this->product;
    }

    /**
     * @param ProductEntity $product
     * @return AddToCartRequestDto
     */
    public function setProduct(ProductEntity $product): AddToCartRequestDto
    {
        $this->product = $product;
        return $this;
    }
}
