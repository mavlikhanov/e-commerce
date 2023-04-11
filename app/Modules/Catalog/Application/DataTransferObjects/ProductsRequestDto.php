<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\DataTransferObjects;

use App\Shared\DataTransferObjects\PaginateRequestDto;

class ProductsRequestDto
{
    private ?int $categoryId = null;
    private ?int $page = null;
    private ?int $perPage = null;

    public function __construct(
        array $requestData
    ) {
        if (isset($requestData['category_id'])) {
            $this->categoryId = (int) $requestData['category_id'];
        }
        if (isset($requestData['page'])) {
            $this->page = (int) $requestData['page'];
        }
        if (isset($requestData['per_page'])) {
            $this->perPage = (int) $requestData['per_page'];
        }
    }

    public function getPaginateRequestDto(): PaginateRequestDto
    {
        $paginateRequestDto = new PaginateRequestDto();
        if ($this->page) {
            $paginateRequestDto->setPage($this->page);
        }
        if ($this->perPage) {
            $paginateRequestDto->setPerPage($this->perPage);
        }

        return $paginateRequestDto;
    }

    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }
}
