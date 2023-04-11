<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Tests\Category;

use Tests\TestCase;

class GetAllCategoriesControllerTest extends TestCase
{
    use EntityStructureTrait;

    public function testGetAllCategories()
    {
        $this->get('/api/categories')
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => $this->getStructure()
                    ]
                ]
            );
    }

    public function testIfEmptyResult()
    {
        $this->get('/api/categories')
            ->assertStatus(200)->isEmpty();
    }
}
