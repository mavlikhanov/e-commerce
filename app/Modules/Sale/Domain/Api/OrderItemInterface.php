<?php
declare(strict_types=1);

namespace App\Modules\Sale\Domain\Api;

interface OrderItemInterface
{
    public const TABLE_NAME = 'order_items';

    public const ID = 'id';

    /***
     * ИИдентификатор заказа, к которому относится товар
     */
    public const ORDER_ID = 'order_id';

    /**
     * Идентификатор элемента корзины
     */
    public const QUOTE_ITEM_ID = 'quote_item_id';

    /***
     * Идентификатор товара, добавленного в корзину
     */
    public const PRODUCT_ID = 'product_id';

    /***
     * Количество товара
     */
    public const QTY = 'qty';

    /***
     * Цена за единицу товара
     */
    public const PRICE = 'price';

    /***
     * Название товара
     */
    public const PRODUCT_NAME = 'product_name';

    /***
     * Артикул товара
     */
    public const PRODUCT_SKU = 'product_sku';

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
        self::ORDER_ID,
        self::QUOTE_ITEM_ID,
        self::PRODUCT_ID,
        self::QTY,
        self::PRICE,
        self::PRODUCT_NAME,
        self::PRODUCT_SKU,
    ];
}
