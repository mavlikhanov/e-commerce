<?php
declare(strict_types=1);

namespace App\Modules\Sale\Domain\Api;

interface QuoteInterface
{
    public const TABLE_NAME = 'quotes';

    public const ID = 'id';

    /***
     * Дата и время преобразования корзины в заказ (если корзина была преобразована в заказ)
     */
    public const CONVERTED_AT = 'converted_at';

    /***
     * Общее количество единиц товаров в корзине
     */
    public const ITEMS_COUNT = 'items_count';

    /***
     * Количество товаров в корзине
     */
    public const ITEMS_QTY = 'items_qty';

    /***
     * Сумма подитога корзины (без доставки)
     */
    public const SUBTOTAL = 'subtotal';

    /***
     * Идентификатор покупателя, которому принадлежит корзина (если покупатель авторизован)
     */
    public const CUSTOMER_ID = 'customer_id';

    /***
     * Email покупателя, который создал корзину
     */
    public const CUSTOMER_EMAIL = 'customer_email';

    /***
     * Телефон покупателя, который создал корзину в формате: 7хххххххххх
     */
    public const CUSTOMER_PHONE = 'customer_phone';

    /***
     * Имя покупателя, который создал корзину
     */
    public const CUSTOMER_FIRSTNAME = 'customer_firstname';

    /***
     * Фамилия покупателя, который создал корзину
     */
    public const CUSTOMER_LASTNAME = 'customer_lastname';

    /***
     * Отчество покупателя, который создал корзину
     */
    public const CUSTOMER_MIDDLE_NAME = 'customer_middle_name';

    /***
     * Адресс покупателя, который создал корзину в формате: идекс, область, город, улица, дом, квартира
     */
    public const CUSTOMER_ADDRESS = 'customer_address';

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
        self::CONVERTED_AT,
        self::ITEMS_COUNT,
        self::ITEMS_QTY,
        self::SUBTOTAL,
        self::CUSTOMER_ID,
        self::CUSTOMER_EMAIL,
        self::CUSTOMER_PHONE,
        self::CUSTOMER_FIRSTNAME,
        self::CUSTOMER_LASTNAME,
        self::CUSTOMER_MIDDLE_NAME,
        self::CUSTOMER_ADDRESS,
    ];
}
