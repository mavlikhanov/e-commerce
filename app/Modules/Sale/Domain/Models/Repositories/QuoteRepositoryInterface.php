<?php
declare(strict_types=1);

namespace App\Modules\Sale\Domain\Models\Repositories;

use App\Modules\Sale\Domain\Models\Entities\QuoteEntity;

interface QuoteRepositoryInterface
{
    public function getById(int $id): QuoteEntity;

    public function createQuote(QuoteEntity $entity): void;

    public function update(int $quoteId, array $data): void;
}
