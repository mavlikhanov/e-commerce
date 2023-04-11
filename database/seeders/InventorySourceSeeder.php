<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Stocks\InventorySource;
use Illuminate\Database\Seeder;

class InventorySourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InventorySource::factory()
            ->count(5)
            ->create();
    }
}
