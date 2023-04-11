<?php
declare(strict_types=1);

namespace App\Modules\Sale\Domain\Models\Repositories;

use App\Modules\Sale\Domain\Models\Collections\QuoteItemCollection;
use App\Modules\Sale\Domain\Models\Entities\QuoteItemEntity;
use App\Shared\Exceptions\RecordNotFoundException;

interface QuoteItemsRepositoryInterface
{
    /**
     * @throws RecordNotFoundException
     */
    public function getById(int $id): QuoteItemEntity;

    /**
     * @throws RecordNotFoundException
     */
    public function findExistProduct(int $quoteId, int $productId): QuoteItemEntity;

    public function getAllByQuoteId(int $quoteId): QuoteItemCollection;

    public function createItem(QuoteItemEntity $entity): void;

    public function updateQty(int $id, int $qty): void;

    public function getExistItem(int $quoteId, int $productId): QuoteItemEntity;
}
