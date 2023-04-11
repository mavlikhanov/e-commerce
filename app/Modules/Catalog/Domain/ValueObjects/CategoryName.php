<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Domain\ValueObjects;

class CategoryName
{
    public function __construct(
        private readonly string $name
    ) {}

    public function getValue(): string
    {
        return $this->name;
    }
}
