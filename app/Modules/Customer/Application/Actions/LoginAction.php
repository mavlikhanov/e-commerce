<?php
declare(strict_types=1);

namespace App\Modules\Customer\Application\Actions;

use App\Modules\Customer\Application\DataTransferObjects\LoginRequestDto;
use App\Modules\Customer\Application\Models\Eloquent\Customer;
use App\Modules\Customer\Application\Models\Eloquent\CustomerInterface;
use App\Shared\Api\HttpStatusCodeInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginAction
{
    public function run(LoginRequestDto $loginRequestDto): JsonResponse
    {
        $loginField = $loginRequestDto->getLoginField();
        $credentials = [
            $loginField => $loginRequestDto->getLogin(),
            CustomerInterface::PASSWORD => $loginRequestDto->getPassword()
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], HttpStatusCodeInterface::UNAUTHORIZED);
        }
        $user = Auth::user();
        $token = $user->createToken('API Token')->accessToken;

        return response()->json([
            'customer' => $this->transform($user),
            'access_token' => $token,
        ]);
    }

    private function transform(Customer $customer): array
    {
        return [
            CustomerInterface::ID => $customer->id,
            CustomerInterface::NAME => $customer->name,
            CustomerInterface::EMAIL => $customer->email,
            CustomerInterface::PHONE => $customer->phone,
            CustomerInterface::ADDRESS => $customer->address,
        ];
    }
}
