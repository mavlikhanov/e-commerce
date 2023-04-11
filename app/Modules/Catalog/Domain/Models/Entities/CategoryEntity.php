<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Domain\Models\Entities;

use App\Modules\Catalog\Domain\ValueObjects\CategoryName;
use App\Shared\Api\EntityInterface;
use App\Shared\Parents\Entities\AbstractEntity;
use Carbon\Carbon;

class CategoryEntity extends AbstractEntity implements EntityInterface
{
    private int $id;
    private Carbon $createdAt;
    private Carbon $updatedAt;

    public function __construct(
        private CategoryName $name,
        private string $slug,
        private string $h1,
        private string $seoTitle,
        private string $seoKeywords,
        private string $seoDescription,
        private string $seoText
    ) {}

    /**
     * @param int $id
     * @return CategoryEntity
     */
    public function setId(int $id): CategoryEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return CategoryName
     */
    public function getName(): CategoryName
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
     * @return CategoryEntity
     */
    public function setCreatedAt(Carbon $createdAt): CategoryEntity
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
     * @return CategoryEntity
     */
    public function setUpdatedAt(Carbon $updatedAt): CategoryEntity
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

}
