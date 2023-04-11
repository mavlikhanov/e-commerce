<?php
declare(strict_types=1);

namespace App\Modules\Sale\Domain\Api;

interface QuoteItemInterface
{
    public const TABLE_NAME = 'quote_items';

    public const ID = 'id';

    /***
     * Идентификатор корзины, к которой относится данный товар
     */
    public const QUOTE_ID = 'quote_id';

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
        self::QUOTE_ID,
        self::PRODUCT_ID,
        self::QTY,
        self::PRICE,
        self::PRODUCT_NAME,
        self::PRODUCT_SKU,
    ];
}
