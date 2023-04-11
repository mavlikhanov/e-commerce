<?php
declare(strict_types=1);

namespace App\Modules\Sale\Domain\Models\Entities;

use App\Modules\Sale\Domain\Models\Collections\QuoteItemCollection;
use App\Modules\Sale\Domain\Models\Repositories\QuoteItemsRepositoryInterface;
use App\Shared\ValueObjects\Price;
use Carbon\Carbon;

class QuoteEntity
{
    private int $id;

    private int $customerId;

    private int $itemsCount;

    private int $itemsQty;
    private Price $subtotal;

    private ?string $customerEmail = null;

    private ?string $customerPhone = null;

    private ?string $customerFirstname = null;

    private ?string $customerLastname = null;

    private ?string $customerMiddleName = null;

    private ?string $customerAddress = null;

    private ?Carbon $convertedAt = null;

    private Carbon $createdAt;

    private Carbon $updatedAt;

    private QuoteItemsRepositoryInterface $quoteItemsRepository;

    private ?QuoteItemCollection $itemCached = null;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return QuoteEntity
     */
    public function setId(int $id): QuoteEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     * @return QuoteEntity
     */
    public function setCustomerId(int $customerId): QuoteEntity
    {
        $this->customerId = $customerId;
        return $this;
    }

    /**
     * @return int
     */
    public function getItemsCount(): int
    {
        return $this->itemsCount;
    }

    /**
     * @param int $itemsCount
     * @return QuoteEntity
     */
    public function setItemsCount(int $itemsCount): QuoteEntity
    {
        $this->itemsCount = $itemsCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getItemsQty(): int
    {
        return $this->itemsQty;
    }

    /**
     * @param int $itemsQty
     * @return QuoteEntity
     */
    public function setItemsQty(int $itemsQty): QuoteEntity
    {
        $this->itemsQty = $itemsQty;
        return $this;
    }

    /**
     * @return Price
     */
    public function getSubtotal(): Price
    {
        return $this->subtotal;
    }

    /**
     * @param Price $subtotal
     * @return QuoteEntity
     */
    public function setSubtotal(Price $subtotal): QuoteEntity
    {
        $this->subtotal = $subtotal;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomerEmail(): ?string
    {
        return $this->customerEmail;
    }

    /**
     * @param string|null $customerEmail
     * @return QuoteEntity
     */
    public function setCustomerEmail(?string $customerEmail): QuoteEntity
    {
        $this->customerEmail = $customerEmail;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomerPhone(): ?string
    {
        return $this->customerPhone;
    }

    /**
     * @param string|null $customerPhone
     * @return QuoteEntity
     */
    public function setCustomerPhone(?string $customerPhone): QuoteEntity
    {
        $this->customerPhone = $customerPhone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomerFirstname(): ?string
    {
        return $this->customerFirstname;
    }

    /**
     * @param string|null $customerFirstname
     * @return QuoteEntity
     */
    public function setCustomerFirstname(?string $customerFirstname): QuoteEntity
    {
        $this->customerFirstname = $customerFirstname;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomerLastname(): ?string
    {
        return $this->customerLastname;
    }

    /**
     * @param string|null $customerLastname
     * @return QuoteEntity
     */
    public function setCustomerLastname(?string $customerLastname): QuoteEntity
    {
        $this->customerLastname = $customerLastname;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomerMiddleName(): ?string
    {
        return $this->customerMiddleName;
    }

    /**
     * @param string|null $customerMiddleName
     * @return QuoteEntity
     */
    public function setCustomerMiddleName(?string $customerMiddleName): QuoteEntity
    {
        $this->customerMiddleName = $customerMiddleName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomerAddress(): ?string
    {
        return $this->customerAddress;
    }

    /**
     * @param string|null $customerAddress
     * @return QuoteEntity
     */
    public function setCustomerAddress(?string $customerAddress): QuoteEntity
    {
        $this->customerAddress = $customerAddress;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getConvertedAt(): ?Carbon
    {
        return $this->convertedAt;
    }

    /**
     * @param Carbon|null $convertedAt
     * @return QuoteEntity
     */
    public function setConvertedAt(?Carbon $convertedAt): QuoteEntity
    {
        $this->convertedAt = $convertedAt;
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
     * @return QuoteEntity
     */
    public function setCreatedAt(Carbon $createdAt): QuoteEntity
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
     * @return QuoteEntity
     */
    public function setUpdatedAt(Carbon $updatedAt): QuoteEntity
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @param QuoteItemsRepositoryInterface $quoteItemsRepository
     * @return QuoteEntity
     */
    public function setQuoteItemsRepository(QuoteItemsRepositoryInterface $quoteItemsRepository): QuoteEntity
    {
        $this->quoteItemsRepository = $quoteItemsRepository;
        return $this;
    }

    public function getItemsCollection(): QuoteItemCollection
    {
        if (empty($this->itemCached)) {
            $this->itemCached = $this->quoteItemsRepository->getAllByQuoteId($this->getId());
        }
        return $this->itemCached;
    }
}
