<?php
declare(strict_types=1);

namespace App\Modules\Customer\Application\DataTransferObjects;

use App\Modules\Customer\Application\Api\RequestValidationInterface;
use App\Modules\Customer\Application\Models\Eloquent\CustomerInterface;
use App\Modules\Customer\Domain\ValueObjects\Phone;
use App\Shared\Api\HttpStatusCodeInterface;
use InvalidArgumentException;

class LoginRequestDto
{
    private ?Phone $phone = null;
    private ?string $email = null;

    public function __construct(
        private readonly string $password
    ) {}

    public function getLoginField(): string
    {
        if ($this->getEmail()) {
            return CustomerInterface::EMAIL;
        }
        if ($this->getPhone()) {
            return CustomerInterface::PHONE;
        }
        $this->invalidLoginException();
    }

    public function getLogin(): int|string
    {
        if ($this->getEmail()) {
            return $this->getEmail();
        }
        if ($this->getPhone()) {
            return $this->getPhone()->getValue();
        }
        $this->invalidLoginException();
    }

    /**
     * @return Phone|null
     */
    public function getPhone(): ?Phone
    {
        return $this->phone;
    }

    /**
     * @param Phone|null $phone
     * @return LoginRequestDto
     */
    public function setPhone(?Phone $phone): LoginRequestDto
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return LoginRequestDto
     */
    public function setEmail(?string $email): LoginRequestDto
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    private function invalidLoginException(): void
    {
        throw new InvalidArgumentException(
            RequestValidationInterface::LOGIN_REQUIRED,
            HttpStatusCodeInterface::UNPROCESSABLE_ENTITY
        );
    }
}
