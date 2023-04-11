<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\Tests\Cart;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AddToCartUnAuthedTest extends TestCase
{
    public function testAddCartItem()
    {
        $payload = [
            'product_id' => 1,
            'qty' => 2,
        ];

        $response = $this->postJson('/api/cart/items', $payload);

        $response->assertStatus(201);
    }

    public function testAddExistingCartItem()
    {
        $payload = [
            'product_id' => 3,
            'qty' => 1,
            'quote_id' => 5
        ];

        $response = $this->postJson('/api/cart/items', $payload);

        $response->assertStatus(201);
    }

    private function getStructure(): array
    {
        return [
            'quoteId',
            'itemsCount',
            'itemsQty',
            'subtotal',
            'items' => [
                '*' => [
                    'itemId',
                    'price',
                    'specialPrice',
                    'name',
                    'sku',
                    'slug',
                    'photo',
                    'productId',
                    'qty',
                ]
            ],
        ];
    }
}
