<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * UsersTableSeeder
         * CategoryTableSeeder
         * InventorySourceSeeder
         * ProductTableSeeder
         * StockItemSeeder
         */

        $this->call([
            CustomerSeeder::class,
            CategoryTableSeeder::class,
            InventorySourceSeeder::class,
            StockItemSeeder::class,
        ]);
    }
}
