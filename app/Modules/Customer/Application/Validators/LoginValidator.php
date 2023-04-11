<?php
declare(strict_types=1);

namespace App\Modules\Customer\Application\Validators;

class LoginValidator
{
    public function isLoginEmail(?string $login): bool
    {
        if (!$login) {
            return false;
        }
        return filter_var($login, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function isLoginPhone(?string $login): bool
    {
        if (!$login) {
            return false;
        }
        return preg_match('/^\d{11}$/', $login) == 1;
    }
}
