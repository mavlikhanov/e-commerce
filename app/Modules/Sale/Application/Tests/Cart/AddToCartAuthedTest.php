<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\Tests\Cart;

use App\Modules\Customer\Application\Models\Eloquent\Customer;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AddToCartAuthedTest extends TestCase
{
    private string $token;

    public function setUp(): void
    {
        parent::setUp();
        $user = Customer::find(1);
        $this->token = $user->createToken('API Token')->accessToken;
    }

    public function testAddCartItem()
    {
        $response = $this->postJson('/api/cart/items', [
            'product_id' => 1,
            'qty' => 2,
        ], [
            'Authorization' => 'Bearer ' . $this->token,
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'product_id' => 1,
                'qty' => 2,
            ]);
    }

    public function testAddExistingCartItem()
    {
        // Предположим, что у нас уже есть элемент в корзине с product_id = 1 и qty = 3
        $existingCartItem = DB::table('quote_items')
            ->where('product_id', 1)
            ->first();

        $payload = [
            'product_id' => 1,
            'qty' => 2,
            'quote_id' => $existingCartItem->quote_id,
        ];

        $response = $this->postJson('/api/cart/items', $payload, [
            'Authorization' => 'Bearer ' . $this->token,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'product_id' => 1,
                'qty' => 5, // Ожидаем, что количество увеличится до 5
            ]);
    }
}
