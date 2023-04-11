<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Tests\Product;

use Tests\TestCase;

class GetProductCategoryTest extends TestCase
{
    use EntityStructureTrait;

    public function testGetProduct()
    {
        $this->get('/api/product/ratione')
            ->assertStatus(200)
            ->assertJsonStructure($this->getStructure());
    }
}
