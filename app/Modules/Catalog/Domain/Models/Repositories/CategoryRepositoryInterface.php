<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Domain\Models\Repositories;

use App\Modules\Catalog\Domain\Models\Collections\CategoryCollection;
use App\Modules\Catalog\Domain\Models\Entities\CategoryEntity;
use App\Shared\Exceptions\RecordNotFoundException;

interface CategoryRepositoryInterface
{
    public function getAll(): CategoryCollection;

    /**
     * @throws RecordNotFoundException
     */
    public function findBySlug(string $slug): CategoryEntity;
}
