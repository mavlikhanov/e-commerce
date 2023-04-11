<?php
declare(strict_types=1);

namespace App\Shared\ValueObjects;

class Price
{
    public function __construct(
        private readonly ?string $price
    ) {}

    public function getValue(): float
    {
        return (float)$this->price;
    }
}
