<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\Managers\Processors;

use App\Modules\Sale\Application\DataTransferObjects\AddToCartRequestDto;

interface ProcessorInterface
{
    public function canProcess(): bool;

    public function process(): void;

    public function setCartDto(AddToCartRequestDto $addToCartRequestDto): ProcessorInterface;
}
