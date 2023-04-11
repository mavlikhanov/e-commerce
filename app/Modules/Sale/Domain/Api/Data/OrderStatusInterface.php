<?php
declare(strict_types=1);

namespace App\Modules\Sale\Domain\Api\Data;

interface OrderStatusInterface
{
    /*** (В ожидании) - статус заказа, когда он только что создан, но еще не был обработан*/
    public const STATUS_PENDING = 'pending';

    /*** (В обработке) - статус, когда заказ был принят и началась его обработка*/
    public const STATUS_PROCESSING = 'processing';

    /*** (Завершен) - статус, когда заказ был полностью выполнен и товары были доставлены или получены покупателем*/
    public const STATUS_COMPLETE = 'complete';

    /*** (Закрыт) - статус, когда заказ был закрыт и больше не может быть изменен*/
    public const STATUS_CLOSED = 'closed';

    /*** (Отменен) - статус, когда заказ был отменен покупателем или продавцом*/
    public const STATUS_CANCELED = 'canceled';

    /*** (Возвращен): статус, когда заказ был возвращен и средства были возвращены покупателю*/
    public const STATUS_REFUNDED = 'refunded';

    /***
     * (В ожидании (приостановлен)) статус когда заказ был приостановлен и ожидает каких-либо действий или подтверждений
     */
    public const STATUS_HOLDED = 'holded';

    /*** (Ожидание оплаты) - статус, когда заказ был создан, но оплата еще не была получена*/
    public const STATUS_PENDING_PAYMENT = 'pending_payment';

    /*** (Проверка оплаты) - статус, когда платеж был отправлен на проверку и ожидает подтверждения*/
    public const STATUS_PAYMENT_REVIEW = 'payment_review';

    /*** (Мошенничество) - статус, когда заказ был помечен как подозрительный на мошенничество*/
    public const STATUS_FRAUD = 'fraud';

    public const MAPPED_STATUSES = [
        self::STATUS_PENDING => 'В ожидании',
        self::STATUS_PROCESSING  => 'В обработке',
        self::STATUS_COMPLETE  => 'Завершен',
        self::STATUS_CLOSED  => 'Закрыт',
        self::STATUS_CANCELED  => 'Отменен',
        self::STATUS_REFUNDED  => 'Возвращен',
        self::STATUS_HOLDED  => 'В ожидании (приостановлен)',
        self::STATUS_PENDING_PAYMENT  => 'Ожидание оплаты',
        self::STATUS_PAYMENT_REVIEW  => 'Проверка оплаты',
        self::STATUS_FRAUD  => 'Мошенничество',
    ];
}
