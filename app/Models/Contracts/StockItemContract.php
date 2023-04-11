<?php
declare(strict_types=1);

namespace App\Models\Contracts;

interface StockItemContract
{
    public const ID = 'id';

    /***
     * Идентификатор продукта
     */
    public const PRODUCT_ID = 'product_id';

    /***
     * Идентификатор склада
     */
    public const INVENTORY_SOURCE_ID = 'inventory_source_id';

    /***
     * Количество товара на складе
     */
    public const QTY = 'qty';

    /***
     * Минимальное количество товара на складе, при котором должно быть выведено сообщение о недостатке
     */
    public const MIN_QTY = 'min_qty';

    /***
     * Минимальное количество товара, которое можно продать
     */
    public const MIN_SALE_QTY = 'min_sale_qty';

    /***
     * Максимальное количество товара, которое можно продать
     */
    public const MAX_SALE_QTY = 'max_sale_qty';

    /**
     * Дата создания
     */
    public const CREATED_AT = 'created_at';

    /**
     * Дата редактирования
     */
    public const UPDATED_AT = 'updated_at';

    public const FIELDS = [
        self::PRODUCT_ID,
        self::INVENTORY_SOURCE_ID,
        self::QTY,
        self::MIN_QTY,
        self::MIN_SALE_QTY,
        self::MAX_SALE_QTY,
    ];
}
