<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Domain\Tests;

use App\Modules\Catalog\Domain\Models\Collections\CategoryCollection;
use App\Modules\Catalog\Domain\Models\Entities\CategoryEntity;
use App\Modules\Catalog\Domain\Models\Repositories\CategoryRepositoryInterface;
use App\Modules\Catalog\Domain\ValueObjects\CategoryName;
use App\Shared\Exceptions\RecordNotFoundException;
use Tests\TestCase;

class CategoryRepositoryTest extends TestCase
{
    private CategoryRepositoryInterface $categoryRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->categoryRepository = app(CategoryRepositoryInterface::class);
    }

    public function testItCanGetAllCategories(): void
    {
        $categoryCollection = $this->categoryRepository->getAll();
        $this->assertInstanceOf(CategoryCollection::class, $categoryCollection);
    }

    public function testItCanGetCategory(): void
    {
        $slug = 'culpa';
        $categoryEntity = $this->categoryRepository->findBySlug($slug);
        $this->assertInstanceOf(CategoryEntity::class, $categoryEntity);
        $this->assertInstanceOf(CategoryName::class, $categoryEntity->getName());
        $this->assertEquals('Culpa.', $categoryEntity->getName()->getValue());
    }

    public function testCategoryNotFound()
    {
        $slug = 'sdfadsfasf';
        $this->expectException(RecordNotFoundException::class);
        $this->categoryRepository->findBySlug($slug);
    }
}
