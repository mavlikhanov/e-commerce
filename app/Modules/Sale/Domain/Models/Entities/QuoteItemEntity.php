<?php
declare(strict_types=1);

namespace App\Modules\Sale\Domain\Models\Entities;

use App\Shared\Api\EntityInterface;
use App\Shared\Parents\Entities\AbstractEntity;
use App\Shared\ValueObjects\Price;
use Carbon\Carbon;

class QuoteItemEntity extends AbstractEntity implements EntityInterface
{
    private int $id;

    private int $quoteId;

    private Price $price;
    private string $productName;
    private string $productSku;

    private Carbon $createdAt;

    private Carbon $updatedAt;

    private string $productSlug;
    private Price $productPrice;
    private Price $productSpecialPrice;
    private string $productPhoto;

    public function __construct(
        private readonly int $productId,
        private int $qty,
    ) {}

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return QuoteItemEntity
     */
    public function setId(int $id): QuoteItemEntity
    {
        $this->id = $id;
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
     * @param int $qty
     * @return QuoteItemEntity
     */
    public function setQty(int $qty): QuoteItemEntity
    {
        $this->qty = $qty;
        return $this;
    }


    /**
     * @return int
     */
    public function getQuoteId(): int
    {
        return $this->quoteId;
    }

    /**
     * @param int $quoteId
     * @return QuoteItemEntity
     */
    public function setQuoteId(int $quoteId): QuoteItemEntity
    {
        $this->quoteId = $quoteId;
        return $this;
    }

    /**
     * @return Price
     */
    public function getPrice(): Price
    {
        return $this->price;
    }

    /**
     * @param Price $price
     * @return QuoteItemEntity
     */
    public function setPrice(Price $price): QuoteItemEntity
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     * @return QuoteItemEntity
     */
    public function setProductName(string $productName): QuoteItemEntity
    {
        $this->productName = $productName;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductSku(): string
    {
        return $this->productSku;
    }

    /**
     * @param string $productSku
     * @return QuoteItemEntity
     */
    public function setProductSku(string $productSku): QuoteItemEntity
    {
        $this->productSku = $productSku;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    /**
     * @param Carbon $createdAt
     * @return QuoteItemEntity
     */
    public function setCreatedAt(Carbon $createdAt): QuoteItemEntity
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    /**
     * @param Carbon $updatedAt
     * @return QuoteItemEntity
     */
    public function setUpdatedAt(Carbon $updatedAt): QuoteItemEntity
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductSlug(): string
    {
        return $this->productSlug;
    }

    /**
     * @param string $productSlug
     * @return QuoteItemEntity
     */
    public function setProductSlug(string $productSlug): QuoteItemEntity
    {
        $this->productSlug = $productSlug;
        return $this;
    }

    /**
     * @return Price
     */
    public function getProductPrice(): Price
    {
        return $this->productPrice;
    }

    /**
     * @param Price $productPrice
     * @return QuoteItemEntity
     */
    public function setProductPrice(Price $productPrice): QuoteItemEntity
    {
        $this->productPrice = $productPrice;
        return $this;
    }

    /**
     * @return Price
     */
    public function getProductSpecialPrice(): Price
    {
        return $this->productSpecialPrice;
    }

    /**
     * @param Price $productSpecialPrice
     * @return QuoteItemEntity
     */
    public function setProductSpecialPrice(Price $productSpecialPrice): QuoteItemEntity
    {
        $this->productSpecialPrice = $productSpecialPrice;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductPhoto(): string
    {
        return $this->productPhoto;
    }

    /**
     * @param string $productPhoto
     * @return QuoteItemEntity
     */
    public function setProductPhoto(string $productPhoto): QuoteItemEntity
    {
        $this->productPhoto = $productPhoto;
        return $this;
    }
}
