<?php
declare(strict_types=1);

namespace App\Modules\Customer\Application\Models\Eloquent;

interface CustomerInterface
{
    public const ID = 'id';

    /**
     * ФИО в формете: Фамили Имя Отчество
     */
    public const NAME = 'name';

    /**
     * Имейл адрес
     */
    public const EMAIL = 'email';

    /**
     * Пароль
     */
    public const PASSWORD = 'password';

    /***
     * Телефон покупателя в формате: 7хххххххххх
     */
    public const PHONE = 'phone';

    /**
     * Адрес в формате: идекс, область, город, улица, дом, квартира
     */
    public const ADDRESS = 'address';

    /**
     * Дата создания
     */
    public const CREATED_AT = 'created_at';

    /**
     * Дата редактирования
     */
    public const UPDATED_AT = 'updated_at';

    public const FIELDS = [
        self::NAME,
        self::EMAIL,
        self::PASSWORD,
        self::PHONE,
        self::ADDRESS,
    ];
}
