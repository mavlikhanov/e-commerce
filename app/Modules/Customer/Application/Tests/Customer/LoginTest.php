<?php
declare(strict_types=1);

namespace App\Modules\Customer\Application\Tests\Customer;

use Tests\TestCase;

class LoginTest extends TestCase
{
    public function testEmailLogin()
    {
        // Тестируем кейс с корректным email логином и паролем
        $response = $this->postJson('/api/customer/login', [
            'login' => 'tkononov.zinaida@example.com',
            'password' => 'q1w2e3r4',
        ]);

        $response->assertStatus(200);
    }

    public function testPhoneLogin()
    {
        // Тестируем кейс с корректным номером телефона логином и паролем
        $response = $this->postJson('/api/customer/login', [
            'login' => '73773410632',
            'password' => 'q1w2e3r4',
        ]);

        $response->assertStatus(200);
    }

    public function testInvalidLogin()
    {
        // Тестируем кейс с некорректным логином и паролем
        $response = $this->postJson('/api/customer/login', [
            'login' => 'invalid_login',
            'password' => 'password123',
        ]);

        $response->assertStatus(422)
            ->assertJson([
                'message' => 'Предоставленные данные неверны.',
                'errors' => [
                    'login' => [
                        'Некорректный логин'
                    ]
                ]
            ]);
    }
}
