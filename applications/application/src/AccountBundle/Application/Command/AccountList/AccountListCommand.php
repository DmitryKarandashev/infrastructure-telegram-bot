<?php

namespace App\AccountBundle\Application\Command\AccountList;

use App\AccountBundle\Application\DTO\AccountListFilter;

class AccountListCommand
{
    protected int $offset;
    protected int $page;

    protected int $limit;
    protected ?AccountListFilter $filter;

    public function __construct(int $offset = 0, int $page = 1, int $limit = 100, AccountListFilter $filter = null)
    {
        $this->offset = $offset;
        $this->page = $page;
        $this->limit = $limit;
        $this->filter = $filter;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getFilter(): ?AccountListFilter
    {
        return $this->filter;
    }

}