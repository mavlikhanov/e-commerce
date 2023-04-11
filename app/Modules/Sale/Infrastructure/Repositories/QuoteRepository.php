<?php
declare(strict_types=1);

namespace App\Modules\Sale\Infrastructure\Repositories;

use App\Modules\Sale\Domain\Api\QuoteInterface;
use App\Modules\Sale\Domain\Models\Entities\QuoteEntity;
use App\Modules\Sale\Domain\Models\EntityBuilders\QuoteEntityBuilder;
use App\Modules\Sale\Domain\Models\Repositories\QuoteRepositoryInterface;
use Illuminate\Support\Facades\DB;

class QuoteRepository implements QuoteRepositoryInterface
{
    public function __construct(
        private readonly QuoteEntityBuilder $quoteEntityBuilder
    ) {}

    public function getById(int $id): QuoteEntity
    {
        $quote = DB::table(QuoteInterface::TABLE_NAME)
            ->where(QuoteInterface::ID, '=', $id)
            ->first();
        return $this->quoteEntityBuilder->getEntity($quote);
    }

    public function createQuote(QuoteEntity $entity): void
    {
        $quoteId = DB::table(QuoteInterface::TABLE_NAME)->insertGetId([
            QuoteInterface::ITEMS_COUNT => $entity->getItemsCount(),
            QuoteInterface::ITEMS_QTY => $entity->getItemsQty(),
            QuoteInterface::SUBTOTAL => $entity->getSubtotal()->getValue(),
            QuoteInterface::CREATED_AT => now(),
            QuoteInterface::UPDATED_AT => now(),
        ]);
        $entity->setId($quoteId);
    }

    public function update(int $quoteId, array $data): void
    {
        DB::table(QuoteInterface::TABLE_NAME)
            ->where(QuoteInterface::ID, '=', $quoteId)
            ->update($data);
    }
}
