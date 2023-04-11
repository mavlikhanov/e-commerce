<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Infrastructure\Repositories;

use App\Modules\Catalog\Domain\Api\CategoryInterface;
use App\Modules\Catalog\Domain\Api\ProductInterface;
use App\Modules\Catalog\Domain\Models\Collections\ProductCollection;
use App\Modules\Catalog\Domain\Models\Entities\ProductEntity;
use App\Modules\Catalog\Domain\Models\EntityBuilders\ProductEntityBuilder;
use App\Modules\Catalog\Domain\Models\Repositories\ProductRepositoryInterface;
use App\Shared\Api\HttpStatusCodeInterface;
use App\Shared\DataTransferObjects\PaginateRequestDto;
use App\Shared\Exceptions\RecordNotFoundException;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{
    public function __construct(
        private readonly ProductEntityBuilder $productEntityBuilder
    ) {}

    public function getAll(
        PaginateRequestDto $paginateRequestDto
    ): ProductCollection {
        $products = DB::table(ProductInterface::TABLE_NAME)
            ->orderBy(ProductInterface::ID, 'desc')
            ->join(
                CategoryInterface::TABLE_NAME,
                CategoryInterface::TABLE_NAME .  '.' . CategoryInterface::ID,
                '=',
                ProductInterface::TABLE_NAME .  '.' . ProductInterface::CATEGORY_ID
            )
            ->select(
                ProductInterface::TABLE_NAME . '.*',
                CategoryInterface::TABLE_NAME . '.' . CategoryInterface::NAME . ' as category_name',
                CategoryInterface::TABLE_NAME . '.' . CategoryInterface::SLUG . ' as category_slug'
            )
            ->paginate(
                $paginateRequestDto->getPerPage(),
                ['*'],
                $paginateRequestDto->getPageName(),
                $paginateRequestDto->getPage()
            );

        return new ProductCollection($products);
    }

    public function getAllByCategoryId(
        PaginateRequestDto $paginateRequestDto,
        int $categoryId
    ):ProductCollection {
        $products = DB::table(ProductInterface::TABLE_NAME)
            ->where(ProductInterface::CATEGORY_ID, '=', $categoryId)
            ->orderBy(ProductInterface::ID, 'desc')
            ->join(
                CategoryInterface::TABLE_NAME,
                CategoryInterface::TABLE_NAME .  '.' . CategoryInterface::ID,
                '=',
                ProductInterface::TABLE_NAME .  '.' . ProductInterface::CATEGORY_ID
            )
            ->select(
                ProductInterface::TABLE_NAME . '.*',
                CategoryInterface::TABLE_NAME . '.' . CategoryInterface::NAME . ' as category_name',
                CategoryInterface::TABLE_NAME . '.' . CategoryInterface::SLUG . ' as category_slug'
            )
            ->paginate(
                $paginateRequestDto->getPerPage(),
                ['*'],
                $paginateRequestDto->getPageName(),
                $paginateRequestDto->getPage()
            );

        return new ProductCollection($products);
    }

    public function findBySlug(string $slug): ProductEntity
    {
        $item = DB::table(ProductInterface::TABLE_NAME)
            ->where(ProductInterface::TABLE_NAME . '.' . ProductInterface::SLUG, '=', $slug)
            ->join(
                CategoryInterface::TABLE_NAME,
                CategoryInterface::TABLE_NAME .  '.' . CategoryInterface::ID,
                '=',
                ProductInterface::TABLE_NAME .  '.' . ProductInterface::CATEGORY_ID
            )
            ->select(
                ProductInterface::TABLE_NAME . '.*',
                CategoryInterface::TABLE_NAME . '.' . CategoryInterface::NAME . ' as category_name',
                CategoryInterface::TABLE_NAME . '.' . CategoryInterface::SLUG . ' as category_slug'
            )
            ->first();
        if (!$item) {
            throw new RecordNotFoundException("Запись с slug $slug не найдена", HttpStatusCodeInterface::NOT_FOUND);
        }
        return $this->productEntityBuilder->getEntity($item);
    }

    public function findById(int $id): ProductEntity
    {
        $item = DB::table(ProductInterface::TABLE_NAME)
            ->where(ProductInterface::TABLE_NAME . '.' . ProductInterface::ID, '=', $id)
            ->join(
                CategoryInterface::TABLE_NAME,
                CategoryInterface::TABLE_NAME .  '.' . CategoryInterface::ID,
                '=',
                ProductInterface::TABLE_NAME .  '.' . ProductInterface::CATEGORY_ID
            )
            ->select(
                ProductInterface::TABLE_NAME . '.*',
                CategoryInterface::TABLE_NAME . '.' . CategoryInterface::NAME . ' as category_name',
                CategoryInterface::TABLE_NAME . '.' . CategoryInterface::SLUG . ' as category_slug'
            )
            ->first();
        if (!$item) {
            throw new RecordNotFoundException("Запись с id $id не найдена", HttpStatusCodeInterface::NOT_FOUND);
        }
        return $this->productEntityBuilder->getEntity($item);
    }
}
