<?php
declare(strict_types=1);

namespace App\Shared\DataTransferObjects;

class PaginateInformationDto
{
    private int $currentPage;
    private int $lastPage;
    private int $total;

    public function __construct(
        array $paginateInformation
    ) {
        $this->currentPage = $paginateInformation['currentPage'];
        $this->lastPage = $paginateInformation['lastPage'];
        $this->total = $paginateInformation['total'];
    }

    /**
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * @return int
     */
    public function getLastPage(): int
    {
        return $this->lastPage;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    public function toArray(): array
    {
        return [
            'currentPage' => $this->getCurrentPage(),
            'lastPage' => $this->getLastPage(),
            'total' => $this->getTotal(),
        ];
    }
}
