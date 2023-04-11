<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\Api;

interface AddToCartRequestValidationInterface
{
    public const PRODUCT_ID_REQUIRED = 'Не передан обязательный параметр "Продукт"';
    public const PRODUCT_QTY_REQUIRED = 'Не передан обязательный параметр "Количество"';
}
