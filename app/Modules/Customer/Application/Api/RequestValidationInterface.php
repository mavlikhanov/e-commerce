<?php
declare(strict_types=1);

namespace App\Modules\Customer\Application\Api;

interface RequestValidationInterface
{
    public const LOGIN_REQUIRED = 'Поле "Логин" обязательно для заполнения';
    public const PASSWORD_REQUIRED = 'Поле "Пароль" обязательно для заполнения';
    public const PASSWORD_MIN = 'Поле "Пароль" должно содержать не менее :min символов';
}
