<?php
declare(strict_types=1);

namespace App\Modules\Customer\Domain\ValueObjects;

class Phone
{
    public function __construct(
        private readonly string $phone
    )
    {}

    public function getValue(): int
    {
        return (int)$this->phone;
    }
}
