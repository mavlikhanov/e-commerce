<?php
declare(strict_types=1);

namespace App\Shared\Parents\Controllers\Traits;

use App\Shared\Api\EntityInterface;
use App\Shared\Parents\Collections\AbstractCollection;
use App\Shared\Parents\Collections\AbstractPaginateCollection;
use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    public function transformFromCollection(AbstractCollection $collection, string $transformer): JsonResponse
    {
        if ($collection->isEmpty()) {
            return response()->json([]);
        }
        $transformer = new $transformer();
        $items = [];
        foreach ($collection as $item) {
            $items[] = $transformer->transformer($item);
        }
        $result['data'] = $items;
        if ($collection instanceof AbstractPaginateCollection) {
            $result['paginateInformation'] = $collection->getPaginateInformation()->toArray();
        }
        return response()->json($result);
    }

    public function transformFromEntity(EntityInterface $entity, string $transformer): JsonResponse
    {
        $transformer = new $transformer();
        return response()->json(
            $transformer->transformer($entity)
        );
    }
}
