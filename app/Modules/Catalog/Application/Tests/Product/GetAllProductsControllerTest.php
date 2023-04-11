<?php
declare(strict_types=1);

namespace App\Modules\Catalog\Application\Tests\Product;

use Tests\TestCase;

class GetAllProductsControllerTest extends TestCase
{
    use EntityStructureTrait;

    public function testGetAllProducts()
    {
        $this->get('/api/products')
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    'data' => [
                        '*' => $this->getStructure()
                    ]
                ]
            );
    }
}
