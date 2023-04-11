<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Domain\Tests;

use App\Modules\Catalog\Domain\Models\Collections\ProductCollection;
use App\Modules\Catalog\Domain\Models\Entities\ProductEntity;
use App\Modules\Catalog\Domain\Models\Repositories\ProductRepositoryInterface;
use App\Shared\DataTransferObjects\PaginateRequestDto;
use App\Shared\Exceptions\RecordNotFoundException;
use Tests\TestCase;

class ProductRepositoryTest extends TestCase
{
    private ProductRepositoryInterface $productRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->productRepository = app(ProductRepositoryInterface::class);
    }

    public function testItCanGetAllProducts()
    {
        $productCollection = $this->productRepository->getAll(new PaginateRequestDto(2));
        $this->assertInstanceOf(ProductCollection::class, $productCollection);
    }

    public function testItCanGetProduct(): void
    {
        $slug = 'eaque-beatae';
        $productEntity = $this->productRepository->findBySlug($slug);
        $this->assertInstanceOf(ProductEntity::class, $productEntity);
    }

    public function testProductNotFound()
    {
        $slug = 'safdsf';
        $this->expectException(RecordNotFoundException::class);
        $this->productRepository->findBySlug($slug);
    }
}
