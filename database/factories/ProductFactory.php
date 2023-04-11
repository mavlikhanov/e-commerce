<?php

namespace Database\Factories;

use App\Modules\Catalog\Application\Models\Eloquent\Product;
use App\Modules\Catalog\Application\Models\Eloquent\ProductInterface;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Catalog\Application\Models\Eloquent\Product>
 */
class ProductFactory extends Factory
{
    public $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->getName();
        $price = $this->getPrice();
        $specialPrice = $this->getSpecialPrice($price);

        return [
            ProductInterface::NAME => $name,
            ProductInterface::SLUG => Str::slug($name),
            ProductInterface::SKU => fake()->unique()->numberBetween(100000, 999999),
            ProductInterface::DESCRIPTION => fake()->paragraph(),
            ProductInterface::PRICE => $price,
            ProductInterface::SPECIAL_PRICE => $specialPrice,
            ProductInterface::CATEGORY_ID => fake()->numberBetween(1, 20),
            ProductInterface::PHOTO => fake()->imageUrl(640, 480, 'products'),
            ProductInterface::H1 => 'H1 ' . $name,
            ProductInterface::SEO_TITLE => 'Title ' . $name,
            ProductInterface::SEO_KEYWORDS => fake()->text(100),
            ProductInterface::SEO_DESCRIPTION => fake()->text(),
            ProductInterface::SEO_TEXT => fake()->text(),
        ];
    }

    private function getName(): string
    {
        return fake()->text(rand(10, 20));
    }

    private function getPrice(): float
    {
        return fake()->randomFloat(2, 2000, 100000);
    }

    private function getSpecialPrice(float $price): float|int|null
    {
        if (!fake()->boolean()) {
            return null;
        }
        return $price - rand(100, 700);
    }
}
