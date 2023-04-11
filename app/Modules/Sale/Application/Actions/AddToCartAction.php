<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\Actions;

use App\Modules\Sale\Application\DataTransferObjects\AddToCartRequestDto;
use App\Modules\Sale\Application\Tasks\GetCartTask;
use App\Modules\Sale\Application\Tasks\AddToCartTask;
use App\Modules\Sale\Application\Tasks\GetProductTask;
use ReflectionException;

class AddToCartAction
{
    public function __construct(
        private readonly GetProductTask $getProductTask,
        private readonly GetCartTask $getCartTask,
        private readonly AddToCartTask $addToCartTask
    ) {}

    /**
     * @throws ReflectionException
     */
    public function run(AddToCartRequestDto $requestDto): void
    {
        $requestDto
            ->setProduct($this->getProductTask->run($requestDto->getProductId()))
            ->setCart($this->getCartTask->run($requestDto));
        $this->addToCartTask->run($requestDto);
    }
}
