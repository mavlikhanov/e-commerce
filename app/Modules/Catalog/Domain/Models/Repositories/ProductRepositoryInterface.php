<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Domain\Models\Repositories;

use App\Modules\Catalog\Domain\Models\Collections\ProductCollection;
use App\Modules\Catalog\Domain\Models\Entities\ProductEntity;
use App\Shared\DataTransferObjects\PaginateRequestDto;

interface ProductRepositoryInterface
{
    public function findById(int $id): ProductEntity;

    public function findBySlug(string $slug): ProductEntity;

    public function getAll(PaginateRequestDto $paginateRequestDto): ProductCollection;

    public function getAllByCategoryId(PaginateRequestDto $paginateRequestDto, int $categoryId): ProductCollection;
}
