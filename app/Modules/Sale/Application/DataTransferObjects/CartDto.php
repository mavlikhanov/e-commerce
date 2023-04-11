<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\DataTransferObjects;

use App\Modules\Catalog\Domain\Models\Entities\ProductEntity;
use App\Modules\Sale\Domain\Models\Entities\QuoteEntity;

class CartDto
{
    public function __construct(
        private readonly QuoteEntity $quoteEntity,
    ) {}


    /**
     * @return QuoteEntity
     */
    public function getQuoteEntity(): QuoteEntity
    {
        return $this->quoteEntity;
    }
}
