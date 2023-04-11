<?php
declare(strict_types=1);

namespace App\Shared\Api;

use stdClass;

interface EntityBuilderInterface
{
    public function getEntity(stdClass $item): EntityInterface;
}
