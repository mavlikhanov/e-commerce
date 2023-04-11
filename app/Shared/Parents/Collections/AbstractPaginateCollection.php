<?php
declare(strict_types=1);

namespace App\Shared\Parents\Collections;

use App\Shared\Api\EntityBuilderInterface;
use App\Shared\DataTransferObjects\PaginateInformationDto;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class AbstractPaginateCollection extends AbstractCollection
{
    public function __construct(
        private readonly LengthAwarePaginator $awarePaginator
    ) {
        parent::__construct($this->getEntities());
    }

    abstract protected function getEntityBuilder(): string;

    public function getPaginateInformation(): PaginateInformationDto
    {
        return new PaginateInformationDto(
            [
                'currentPage' => $this->awarePaginator->currentPage(),
                'lastPage' => $this->awarePaginator->lastPage(),
                'total' => $this->awarePaginator->total(),
            ]
        );
    }

    private function getEntities(): array
    {
        /*** @var $entityBuilder EntityBuilderInterface */
        $entityBuilder = app($this->getEntityBuilder());
        $items = $this->awarePaginator->items();
        $result = [];
        foreach ($items as $item) {
            $result[] = $entityBuilder->getEntity($item);
        }
        return $result;
    }
}
