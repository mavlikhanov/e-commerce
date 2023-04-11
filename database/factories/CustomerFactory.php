<?php
declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Customer\Application\Models\Eloquent\Customer;
use App\Modules\Customer\Application\Models\Eloquent\CustomerInterface;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Customer>
 */
class CustomerFactory extends AbstractFactory
{
    public $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            CustomerInterface::NAME => fake()->name(),
            CustomerInterface::EMAIL => fake()->unique()->safeEmail(),
            CustomerInterface::PASSWORD => bcrypt('q1w2e3r4'),
            CustomerInterface::PHONE => $this->generatePhoneNumber(),
            CustomerInterface::ADDRESS => fake()->address(),
        ];
    }

}
