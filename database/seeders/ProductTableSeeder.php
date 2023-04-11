<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Modules\Catalog\Application\Models\Eloquent\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()
            ->count(10)
            ->create();
    }
}
