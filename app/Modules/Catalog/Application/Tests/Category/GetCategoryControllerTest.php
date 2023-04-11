<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Tests\Category;

use Tests\TestCase;

class GetCategoryControllerTest extends TestCase
{
    use EntityStructureTrait;

    public function testGetCategory()
    {
        $this->get('/api/category/culpa')
            ->assertStatus(200)
            ->assertJsonStructure($this->getStructure());
    }
}
