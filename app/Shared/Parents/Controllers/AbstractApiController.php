<?php
declare(strict_types=1);

namespace App\Shared\Parents\Controllers;

use App\Shared\Parents\Controllers\Traits\ApiResponseTrait;

abstract class AbstractApiController extends AbstractParentController
{
    use ApiResponseTrait;
}
