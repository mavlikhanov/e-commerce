<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\Tasks;

use App\Modules\Sale\Application\DataTransferObjects\AddToCartRequestDto;
use App\Modules\Sale\Domain\Models\Entities\QuoteEntity;
use App\Modules\Sale\Domain\Models\Repositories\QuoteItemsRepositoryInterface;
use App\Modules\Sale\Domain\Models\Repositories\QuoteRepositoryInterface;

class GetCartTask
{
    private AddToCartRequestDto $requestDto;

    public function __construct(
        private readonly QuoteRepositoryInterface $quoteRepository,
        private readonly QuoteItemsRepositoryInterface $quoteItemsRepository,
    ) {}

    public function run(AddToCartRequestDto $requestDto): QuoteEntity
    {
        $this->requestDto = $requestDto;
        if ($requestDto->getQuoteId()) {
            return $this->getExistCart();
        }
        $quote = new QuoteEntity();
        $quote->setQuoteItemsRepository($this->quoteItemsRepository);
        return $quote;
    }

    private function getExistCart(): QuoteEntity
    {
        $quote = $this->quoteRepository->getById($this->requestDto->getQuoteId());
        $quote->setQuoteItemsRepository($this->quoteItemsRepository);
        return $quote;
    }
}
