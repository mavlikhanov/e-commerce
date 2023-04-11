<?php
declare(strict_types=1);

namespace App\Modules\Sale\Domain\Api;

use App\Modules\Sale\Domain\Api\Data\OrderStatusInterface;

interface OrderInterface
{
    public const TABLE_NAME = 'orders';

    public const ID = 'id';

    /**
     * Уникальный идентификатор заказа, используемый для отображения на сайте
     */
    public const INCREMENT_ID = 'increment_id';

    /***
     * Идентификатор корзины, из которой был сделан заказ
     */
    public const QUOTE_ID = 'quote_id';

    /***
     * Статус заказа (описание: @var OrderStatusInterface)
     */
    public const STATUS = 'status';

    /**
     * Итоговая сумма
     */
    public const TOTAL = 'total';

    /***
     * Идентификатор покупателя, который сделал заказ (если покупатель авторизован)
     */
    public const CUSTOMER_ID = 'customer_id';

    /***
     * Email покупателя, который создал корзину
     */
    public const CUSTOMER_EMAIL = 'customer_email';

    /***
     * Телефон покупателя в формате: 7хххххххххх
     */
    public const CUSTOMER_PHONE = 'customer_phone';

    /***
     * Имя покупателя
     */
    public const CUSTOMER_FIRSTNAME = 'customer_firstname';

    /***
     * Фамилия покупателя
     */
    public const CUSTOMER_LASTNAME = 'customer_lastname';

    /***
     * Отчество покупателя
     */
    public const CUSTOMER_MIDDLE_NAME = 'customer_middle_name';

    /***
     * Адресс покупателя в формате: идекс, область, город, улица, дом, квартира
     */
    public const CUSTOMER_ADDRESS = 'customer_address';

    /**
     * Флаг, указывающий, был ли заказ сделан без регистрации
     */
    public const CUSTOMER_IS_GUEST = 'customer_is_guest';

    /**
     * Флаг, указывающий, было ли отправлено письмо с подтверждением заказа
     */
    public const EMAIL_SENT = 'email_sent';

    /**
     * Дата создания
     */
    public const CREATED_AT = 'created_at';

    /**
     * Дата редактирования
     */
    public const UPDATED_AT = 'updated_at';

    public const FIELDS = [
        self::ID,
        self::INCREMENT_ID,
        self::QUOTE_ID,
        self::STATUS,
        self::TOTAL,
        self::CUSTOMER_ID,
        self::CUSTOMER_EMAIL,
        self::CUSTOMER_PHONE,
        self::CUSTOMER_FIRSTNAME,
        self::CUSTOMER_LASTNAME,
        self::CUSTOMER_MIDDLE_NAME,
        self::CUSTOMER_ADDRESS,
        self::CUSTOMER_IS_GUEST,
        self::EMAIL_SENT,
    ];
}
