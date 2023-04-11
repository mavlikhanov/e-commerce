<?php
declare(strict_types=1);

namespace App\Shared\DataTransferObjects;

use App\Shared\Api\PaginateInterface;

class PaginateRequestDto
{
    private int $perPage;
    private int $page;

    private string $pageName = 'page';

    public function __construct(
        int $page = PaginateInterface::CURRENT_PAGE,
        int $perPage = PaginateInterface::PER_PAGE
    ) {
        $this->perPage = $perPage;
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @return string
     */
    public function getPageName(): string
    {
        return $this->pageName;
    }

    /**
     * @param int $perPage
     * @return PaginateRequestDto
     */
    public function setPerPage(int $perPage): PaginateRequestDto
    {
        $this->perPage = $perPage;
        return $this;
    }

    /**
     * @param int $page
     * @return PaginateRequestDto
     */
    public function setPage(int $page): PaginateRequestDto
    {
        $this->page = $page;
        return $this;
    }
}
