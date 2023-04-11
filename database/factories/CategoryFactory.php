<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Catalog\Application\Models\Eloquent\Category;
use App\Modules\Catalog\Application\Models\Eloquent\CategoryInterface;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    public $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->text(rand(10, 20));
        return [
            CategoryInterface::NAME => $name,
            CategoryInterface::SLUG => Str::slug($name),
            CategoryInterface::H1 => 'H1 ' . $name,
            CategoryInterface::SEO_TITLE => 'Title ' . $name,
            CategoryInterface::SEO_KEYWORDS => fake()->text(100),
            CategoryInterface::SEO_DESCRIPTION => fake()->text(),
            CategoryInterface::SEO_TEXT => fake()->text(),
        ];
    }
}
