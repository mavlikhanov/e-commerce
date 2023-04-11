<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Requests;

use App\Modules\Catalog\Application\DataTransferObjects\ProductsRequestDto;
use App\Shared\Parents\Requests\AbstractFormRequest;

class GetProductsRequest extends AbstractFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }

    public function toDto(): ProductsRequestDto
    {
        return new ProductsRequestDto(
            $this->toArray()
        );
    }
}
