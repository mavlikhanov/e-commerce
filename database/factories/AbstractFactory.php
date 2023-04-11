<?php
declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

abstract class AbstractFactory extends Factory
{
    protected function generatePhoneNumber(): string
    {
        return sprintf('7%s', rand(0000000000, 9999999999));
    }
}
