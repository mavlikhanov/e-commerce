<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\Requests;

use App\Modules\Sale\Application\Api\AddToCartRequestValidationInterface;
use App\Modules\Sale\Application\DataTransferObjects\AddToCartRequestDto;
use App\Modules\Sale\Domain\Api\QuoteItemInterface;
use App\Shared\Parents\Requests\AbstractFormRequest;

class AddToCartRequest extends AbstractFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            QuoteItemInterface::PRODUCT_ID => ['int', 'required'],
            QuoteItemInterface::QTY => ['int', 'required'],
            QuoteItemInterface::QUOTE_ID => ['int'],
        ];
    }

    public function messages(): array
    {
        return [
            QuoteItemInterface::PRODUCT_ID . '.required' => AddToCartRequestValidationInterface::PRODUCT_ID_REQUIRED,
            QuoteItemInterface::QTY . '.required' => AddToCartRequestValidationInterface::PRODUCT_QTY_REQUIRED,
        ];
    }

    public function toDto(): AddToCartRequestDto
    {
        $addToCartDto = new AddToCartRequestDto((int)$this->product_id, (int)$this->qty);
        if ($this->quote_id) {
            $addToCartDto->setQuoteId($this->quote_id);
        }
        return $addToCartDto;
    }
}
