<?php
declare(strict_types=1);

namespace App\Modules\Sale\Infrastructure\Repositories;

use App\Modules\Catalog\Domain\Api\ProductInterface;
use App\Modules\Sale\Domain\Api\QuoteItemInterface;
use App\Modules\Sale\Domain\Models\Collections\QuoteItemCollection;
use App\Modules\Sale\Domain\Models\Entities\QuoteItemEntity;
use App\Modules\Sale\Domain\Models\EntityBuilders\QuoteItemEntityBuilder;
use App\Modules\Sale\Domain\Models\Repositories\QuoteItemsRepositoryInterface;
use App\Shared\Api\HttpStatusCodeInterface;
use App\Shared\Exceptions\RecordNotFoundException;
use Illuminate\Support\Facades\DB;
use stdClass;

class QuoteItemsRepository implements QuoteItemsRepositoryInterface
{
    public function __construct(
        private readonly QuoteItemEntityBuilder $quoteItemEntityBuilder
    ) {}

    /**
     * @throws RecordNotFoundException
     */
    public function getById(int $id): QuoteItemEntity
    {
        $quote = DB::table(QuoteItemInterface::TABLE_NAME)
            ->where(QuoteItemInterface::ID, '=', $id)
            ->first();
        if (!$quote) {
            throw new RecordNotFoundException("Запись с id $quoteId не найдена", HttpStatusCodeInterface::NOT_FOUND);
        }
        return $this->quoteItemEntityBuilder->getEntity($quote);
    }

    /**
     * @throws RecordNotFoundException
     */
    public function findExistProduct(int $quoteId, int $productId): QuoteItemEntity
    {
        $quote = DB::table(QuoteItemInterface::TABLE_NAME)
            ->where(QuoteItemInterface::ID, '=', $quoteId)
            ->where(QuoteItemInterface::PRODUCT_ID, '=', $productId)
            ->first();

        if (!$quote) {
            throw new RecordNotFoundException("Запись с id $quoteId не найдена", HttpStatusCodeInterface::NOT_FOUND);
        }
        return $this->quoteItemEntityBuilder->getEntity($quote);
    }

    public function getAllByQuoteId(int $quoteId): QuoteItemCollection
    {
        $items = DB::table(QuoteItemInterface::TABLE_NAME)
            ->where(QuoteItemInterface::QUOTE_ID, '=', $quoteId)
            ->join(
                ProductInterface::TABLE_NAME,
                QuoteItemInterface::TABLE_NAME . '.' . QuoteItemInterface::PRODUCT_ID,
                '=',
                ProductInterface::TABLE_NAME . '.' . ProductInterface::ID,
            )
            ->select(
                QuoteItemInterface::TABLE_NAME . '.*',
                ProductInterface::TABLE_NAME . '.' . ProductInterface::SLUG . ' as product_slug',
                ProductInterface::TABLE_NAME . '.' . ProductInterface::PRICE . ' as product_price',
                ProductInterface::TABLE_NAME . '.' . ProductInterface::SPECIAL_PRICE . ' as product_special_price',
                ProductInterface::TABLE_NAME . '.' . ProductInterface::PHOTO . ' as product_photo',
            )
            ->get()
            ->map(fn (stdClass $item) => $this->quoteItemEntityBuilder->getEntity($item));
        return new QuoteItemCollection($items->toArray());
    }

    public function createItem(QuoteItemEntity $entity): void
    {
        $quoteItemId = DB::table(QuoteItemInterface::TABLE_NAME)->insertGetId([
            QuoteItemInterface::QUOTE_ID => $entity->getQuoteId(),
            QuoteItemInterface::PRODUCT_ID => $entity->getProductId(),
            QuoteItemInterface::QTY => $entity->getQty(),
            QuoteItemInterface::PRICE => $entity->getPrice()->getValue(),
            QuoteItemInterface::PRODUCT_NAME => $entity->getProductName(),
            QuoteItemInterface::PRODUCT_SKU => $entity->getProductSku(),
            QuoteItemInterface::CREATED_AT => now(),
            QuoteItemInterface::UPDATED_AT => now(),
        ]);
        $entity->setId($quoteItemId);
    }

    public function updateQty(int $id, int $qty): void
    {
        DB::table(QuoteItemInterface::TABLE_NAME)
            ->where(QuoteItemInterface::ID, '=', $id)
            ->update([QuoteItemInterface::QTY => $qty]);
    }

    public function getExistItem(int $quoteId, int $productId): QuoteItemEntity
    {
        $item = DB::table(QuoteItemInterface::TABLE_NAME)
            ->where(QuoteItemInterface::QUOTE_ID, '=', $quoteId)
            ->where(QuoteItemInterface::PRODUCT_ID, '=', $productId)
            ->first();
        if (!$item) {
            throw new RecordNotFoundException("Запись с id $quoteId не найдена", HttpStatusCodeInterface::NOT_FOUND);
        }
        return $this->quoteItemEntityBuilder->getEntity($item);
    }
}
