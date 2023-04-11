<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Stocks\StockItem;
use Illuminate\Database\Seeder;

class StockItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StockItem::factory()
            ->count(10)
            ->create();
    }
}
