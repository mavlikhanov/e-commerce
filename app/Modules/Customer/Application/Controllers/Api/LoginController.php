<?php
declare(strict_types=1);

namespace App\Modules\Customer\Application\Controllers\Api;

use App\Modules\Customer\Application\Actions\LoginAction;
use App\Modules\Customer\Application\Requests\LoginRequest;
use App\Shared\Parents\Controllers\AbstractApiController;
use Illuminate\Http\JsonResponse;

class LoginController extends AbstractApiController
{
    public function __construct(
        private readonly LoginAction $loginAction
    ) {}

    public function __invoke(LoginRequest $loginRequest): JsonResponse
    {
        $requestDto = $loginRequest->toDto();
        return $this->loginAction->run($requestDto);
    }
}
