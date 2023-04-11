<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Domain\Api;

interface ProductInterface
{
    public const TABLE_NAME = 'products';

    public const ID = 'id';

    /**
     * Название продукта
     */
    public const NAME = 'name';

    /**
     * Сео: Слаг
     */
    public const SLUG = 'slug';

    /**
     * Артикул товара
     */
    public const SKU = 'sku';

    /**
     * Описание тавара
     */
    public const DESCRIPTION = 'description';

    /**
     * Цена товара
     */
    public const PRICE = 'price';

    /**
     * Цена со скидкой
     */
    public const SPECIAL_PRICE = 'special_price';

    /**
     * Идентификатор категории
     */
    public const CATEGORY_ID = 'category_id';

    /**
     * Картинка товара
     */
    public const PHOTO = 'photo';

    /**
     * Сео: Заголовок для тега <h1>
     */
    public const H1 = 'h1';

    /**
     * Сео: Заголовок для тега <title>
     */
    public const SEO_TITLE = 'seo_title';

    /**
     * Сео: Ключевые слова
     */
    public const SEO_KEYWORDS = 'seo_keywords';

    /**
     * Сео: Описание
     */
    public const SEO_DESCRIPTION = 'seo_description';

    /**
     * Сео: текст на странице
     */
    public const SEO_TEXT = 'seo_text';

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
        self::SLUG,
        self::SKU,
        self::DESCRIPTION,
        self::PRICE,
        self::SPECIAL_PRICE,
        self::CATEGORY_ID,
        self::PHOTO,
        self::H1,
        self::SEO_TITLE,
        self::SEO_KEYWORDS,
        self::SEO_DESCRIPTION,
        self::SEO_TEXT,
    ];
}
