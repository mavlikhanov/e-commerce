<?php
declare(strict_types=1);

namespace App\Models\Contracts;

use App\Models\Contracts\Data\InventorySourceStatusContract;

interface InventorySourceContract
{
    public const ID = 'id';

    /**
     * Код склада
     */
    public const CODE = 'code';

    /**
     * Название склада
     */
    public const NAME = 'name';

    /**
     * Имя контактного лица, в формате: Фамилия Имя Отчество
     */
    public const CONTACT_FULL_NAME = 'contact_full_name';

    /**
     * Email контактного лица
     */
    public const CONTACT_EMAIL = 'contact_email';

    /**
     * Телефон контактного лица
     */
    public const CONTACT_PHONE = 'contact_phone';

    /**
     * Адрес склада в формате: идекс, область, город, улица, дом, квартира
     */
    public const ADDRESS = 'address';

    /**
     * Статус склада (описание: @var InventorySourceStatusContract)
     */
    public const STATUS = 'status';

    /**
     * Дата создания
     */
    public const CREATED_AT = 'created_at';

    /**
     * Дата редактирования
     */
    public const UPDATED_AT = 'updated_at';

    public const FIELDS = [
        self::CODE,
        self::NAME,
        self::CONTACT_FULL_NAME,
        self::CONTACT_EMAIL,
        self::CONTACT_PHONE,
        self::ADDRESS,
        self::STATUS,
    ];
}
