<?php
declare(strict_types=1);

namespace Database\Factories\Stocks;

use App\Models\Contracts\StockItemContract;
use App\Models\Stocks\StockItem;
use App\Modules\Catalog\Application\Models\Eloquent\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StockItem>
 */
class StockItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $qty = fake()->numberBetween(0, 100);
        return [
            StockItemContract::PRODUCT_ID => Product::factory()->create()->id,
            StockItemContract::INVENTORY_SOURCE_ID => fake()->numberBetween(1, 5),
            StockItemContract::QTY => $qty,
            StockItemContract::MIN_QTY => $this->getRandomQty(),
            StockItemContract::MIN_SALE_QTY => $this->getRandomQty(),
            StockItemContract::MAX_SALE_QTY => $qty,
        ];
    }

    private function getRandomQty(): ?int
    {
        if (!fake()->boolean()) {
            return 1;
        }
        return fake()->numberBetween(1, 3);
    }
}
