<?php
declare(strict_types=1);

namespace App\Modules\Customer\Application\Requests;

use App\Modules\Customer\Application\Api\RequestValidationInterface;
use App\Modules\Customer\Application\DataTransferObjects\LoginRequestDto;
use App\Modules\Customer\Application\Validators\LoginValidator;
use App\Modules\Customer\Domain\ValueObjects\Phone;
use App\Shared\Api\HttpStatusCodeInterface;
use App\Shared\Parents\Requests\AbstractFormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends AbstractFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login' => ['required', 'string', function ($attribute, $value, $fail) {
                if ($this->isInvalidLogin($value)) {
                    $fail('Некорректный логин');
                }
            }],
            'password' => ['required', 'string', 'min:6'],
        ];
    }

    public function messages(): array
    {
        return [
            'login.required' => RequestValidationInterface::LOGIN_REQUIRED,
            'password.required' => RequestValidationInterface::PASSWORD_REQUIRED,
            'password.min' => RequestValidationInterface::PASSWORD_MIN,
        ];
    }

    public function toDto(): LoginRequestDto
    {
        $loginRequestDto = new LoginRequestDto($this->password);
        $loginValidator = new LoginValidator();
        if ($loginValidator->isLoginPhone($this->login)) {
            $loginRequestDto->setPhone(new Phone($this->login));
        }
        if ($loginValidator->isLoginEmail($this->login)) {
            $loginRequestDto->setPhone($this->login);
        }
        return $loginRequestDto;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Предоставленные данные неверны.',
            'errors' => $validator->errors(),
        ], HttpStatusCodeInterface::UNPROCESSABLE_ENTITY));
    }

    private function isInvalidLogin($value): bool
    {
        $isNotEmail = !filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
        $isNotPhone = preg_match('/^\d{11}$/', $value) == 0;
        return $isNotEmail && $isNotPhone;
    }
}
