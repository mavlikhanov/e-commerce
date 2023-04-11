<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Models\Eloquent;

interface CategoryInterface
{
    public const ID = 'id';

    /**
     * Название категории
     */
    public const NAME = 'name';

    /**
     * Сео: Слаг
     */
    public const SLUG = 'slug';

    /**
     * Сео: Заголовок для тега <h1>
     */
    public const H1 = 'h1';

    /**
     * Сео: Заголовок для тега <title>
     */
    public const SEO_TITLE = 'seo_title';

    /**
     * Сео: Ключевые слов
     */
    public const SEO_KEYWORDS = 'seo_keywords';

    /**
     * Сео: Описание
     */
    public const SEO_DESCRIPTION = 'seo_description';

    /**
     * Сео: Текст для первой страце
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
        self::H1,
        self::SEO_TITLE,
        self::SEO_KEYWORDS,
        self::SEO_DESCRIPTION,
        self::SEO_TEXT,
    ];
}
