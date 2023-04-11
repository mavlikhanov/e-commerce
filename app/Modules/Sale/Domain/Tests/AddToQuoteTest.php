<?php
declare(strict_types=1);

namespace App\Modules\Sale\Domain\Tests;

use App\Modules\Catalog\Application\Models\Eloquent\Product;
use App\Modules\Sale\Domain\Api\QuoteInterface;
use App\Modules\Sale\Domain\Api\QuoteItemInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AddToQuoteTest extends TestCase
{
//    use RefreshDatabase;

    private $product;


    public function setUp(): void
    {
        parent::setUp();
        $this->product = Product::find(1);
    }

    public function testItCanInsertQuote()
    {
        $itemsQty = 2;
        $price = $this->product->price;

        $quoteData = [
            QuoteInterface::ITEMS_COUNT => 1,
            QuoteInterface::ITEMS_QTY => $itemsQty,
            QuoteInterface::SUBTOTAL => $price * 2,
            QuoteInterface::CREATED_AT => now(),
            QuoteInterface::UPDATED_AT => now(),
        ];

        $quoteId = DB::table(QuoteInterface::TABLE_NAME)->insertGetId($quoteData);
        $quoteData[QuoteInterface::ID] = $quoteId;

        $this->assertDatabaseHas(QuoteInterface::TABLE_NAME, $quoteData);

        $quoteItemData = [
            QuoteItemInterface::QUOTE_ID => $quoteId,
            QuoteItemInterface::PRODUCT_ID => $this->product->id,
            QuoteItemInterface::QTY => $itemsQty,
            QuoteItemInterface::PRICE => $price,
            QuoteItemInterface::PRODUCT_NAME => $this->product->name,
            QuoteItemInterface::PRODUCT_SKU => $this->product->sku,
            QuoteItemInterface::CREATED_AT => now(),
            QuoteItemInterface::UPDATED_AT => now(),
        ];

        $quoteItemId = DB::table(QuoteItemInterface::TABLE_NAME)->insertGetId($quoteItemData);

        $quoteItemData[QuoteItemInterface::ID] = $quoteItemId;
        $this->assertDatabaseHas(QuoteItemInterface::TABLE_NAME, $quoteItemData);
    }

    public function itCanInsertQuoteItem()
    {

    }
}
