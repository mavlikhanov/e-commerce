<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Domain\Models\Entities;

use App\Shared\Api\EntityInterface;
use App\Shared\Parents\Entities\AbstractEntity;
use App\Shared\ValueObjects\Price;
use Carbon\Carbon;

class ProductEntity extends AbstractEntity implements EntityInterface
{
    private int $id;

    private Carbon $createdAt;
    private Carbon $updatedAt;

    private ?string $categoryName = null;
    private ?string $categorySlug = null;

    public function __construct(
        private string $name,
        private string $slug,
        private string $sku,
        private string $description,
        private Price $price,
        private Price $specialPrice,
        private string $photo,
        private int $categoryId,
        private string $h1,
        private string $seoTitle,
        private string $seoKeywords,
        private string $seoDescription,
        private string $seoText
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
     * @return ProductEntity
     */
    public function setId(int $id): ProductEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return Price
     */
    public function getPrice(): Price
    {
        return $this->price;
    }

    /**
     * @return Price
     */
    public function getSpecialPrice(): Price
    {
        return $this->specialPrice;
    }

    /**
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @return string
     */
    public function getH1(): string
    {
        return $this->h1;
    }

    /**
     * @return string
     */
    public function getSeoTitle(): string
    {
        return $this->seoTitle;
    }

    /**
     * @return string
     */
    public function getSeoKeywords(): string
    {
        return $this->seoKeywords;
    }

    /**
     * @return string
     */
    public function getSeoDescription(): string
    {
        return $this->seoDescription;
    }

    /**
     * @return string
     */
    public function getSeoText(): string
    {
        return $this->seoText;
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
     * @return ProductEntity
     */
    public function setCreatedAt(Carbon $createdAt): ProductEntity
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
     * @return ProductEntity
     */
    public function setUpdatedAt(Carbon $updatedAt): ProductEntity
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    /**
     * @param string|null $categoryName
     * @return ProductEntity
     */
    public function setCategoryName(?string $categoryName): ProductEntity
    {
        $this->categoryName = $categoryName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCategorySlug(): ?string
    {
        return $this->categorySlug;
    }

    /**
     * @param string|null $categorySlug
     * @return ProductEntity
     */
    public function setCategorySlug(?string $categorySlug): ProductEntity
    {
        $this->categorySlug = $categorySlug;
        return $this;
    }
}
