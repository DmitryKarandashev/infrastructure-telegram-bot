<?php

namespace App\AccountBundle\Application\Command\AccountList;

use App\AccountBundle\Application\DTO\AccountListFilter;

class AccountListCommand
{
    protected int $offset;
    protected int $page;
    protected ?AccountListFilter $filter;

    public function __construct(int $offset = 0, int $page = 1, AccountListFilter $filter = null)
    {
        $this->offset = $offset;
        $this->page = $page;
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

    public function getFilter(): ?AccountListFilter
    {
        return $this->filter;
    }

}