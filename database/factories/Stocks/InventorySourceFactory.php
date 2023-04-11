<?php
declare(strict_types=1);

namespace Database\Factories\Stocks;

use App\Models\Contracts\Data\InventorySourceStatusContract;
use App\Models\Contracts\InventorySourceContract;
use App\Models\Stocks\InventorySource;
use Database\Factories\AbstractFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<InventorySource>
 */
class InventorySourceFactory extends AbstractFactory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            InventorySourceContract::CODE => $this->getCode(),
            InventorySourceContract::NAME => fake()->name(),
            InventorySourceContract::CONTACT_FULL_NAME => fake()->name(),
            InventorySourceContract::CONTACT_EMAIL => fake()->safeEmail(),
            InventorySourceContract::CONTACT_PHONE => $this->generatePhoneNumber(),
            InventorySourceContract::ADDRESS => fake()->address(),
            InventorySourceContract::STATUS => $this->getStatus(),
        ];
    }

    private function getCode(): string
    {
        $letters = [];
        for ($i = 0; $i < 4; $i++) {
            $letters[] = fake()->randomLetter();
        }
        $code = implode('', $letters);
        return Str::upper($code);
    }

    private function getStatus(): string
    {
        if (fake()->boolean()) {
            return InventorySourceStatusContract::STATUS_ACTIVE;
        }
        return InventorySourceStatusContract::STATUS_INACTIVE;
    }
}
