<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\Managers;

use App\Modules\Sale\Application\Managers\Processors\ProcessorInterface;
use App\Shared\Processors\AbstractDi;
use ReflectionException;

class CartProcessorDi extends AbstractDi
{
    protected string $directory = 'app/Modules/Sale/Application/Managers/Processors/CreateNewCartProcessor';
    protected string $namespace = '\App\Modules\Sale\Application\Managers\Processors\%s';

    /**
     * @throws ReflectionException
     * @return ProcessorInterface[]
     */
    public function matchProcessors(): array
    {
        return $this->parseProcessors();
    }
}
