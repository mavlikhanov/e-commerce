<?php
declare(strict_types=1);

namespace App\Modules\Sale\Application\Controllers\Api;

use App\Modules\Sale\Application\Actions\AddToCartAction;
use App\Modules\Sale\Application\Requests\AddToCartRequest;
use App\Shared\Api\HttpStatusCodeInterface;
use App\Shared\Parents\Controllers\AbstractApiController;
use Illuminate\Http\JsonResponse;

class AddToCartController extends AbstractApiController
{
    public function __construct(
        private readonly AddToCartAction $addToCartAction
    ) {}

    public function __invoke(AddToCartRequest $addToCartRequest): JsonResponse
    {
        $requestDto = $addToCartRequest->toDto();
        try {
            $this->addToCartAction->run($requestDto);
            return response()->json([], HttpStatusCodeInterface::CREATED);
        } catch (\Exception $exception) {
            return response()->json(['error' => true, 'message' => 'Что-то пошло не так'], HttpStatusCodeInterface::OK);
        }
    }
}
