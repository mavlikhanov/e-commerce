<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\Tasks;

use App\Modules\Sale\Application\DataTransferObjects\AddToCartRequestDto;
use App\Modules\Sale\Application\Managers\CartProcessorDi;
use ReflectionException;

class AddToCartTask
{
    public function __construct(
        private readonly CartProcessorDi $cartProcessorDi
    ) {}

    /**
     * @throws ReflectionException
     */
    public function run(AddToCartRequestDto $requestDto): void
    {
        $processors = $this->cartProcessorDi->matchProcessors();
        foreach ($processors as $processor) {
            $processor->setCartDto($requestDto);
            if ($processor->canProcess()) {
                $processor->process();
                break;
            }
        }
    }
}
