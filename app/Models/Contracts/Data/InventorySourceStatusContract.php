<?php
declare(strict_types=1);

namespace App\Models\Contracts\Data;

interface InventorySourceStatusContract
{
    /*** (Работает) - склад работает*/
    public const STATUS_ACTIVE = 'active';

    /*** (Не работает) - склад не работает*/
    public const STATUS_INACTIVE = 'inactive';

    public const MAPPED_STATUSES = [
        self::STATUS_ACTIVE => 'Работает',
        self::STATUS_INACTIVE => 'Не работает',
    ];
}
