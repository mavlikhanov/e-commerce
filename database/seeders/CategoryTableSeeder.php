<?php
declare(strict_types=1);

namespace Database\Seeders;

use App\Modules\Catalog\Application\Models\Eloquent\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
            ->count(20)
            ->create();
    }
}
