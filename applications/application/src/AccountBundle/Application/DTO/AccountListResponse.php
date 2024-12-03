<?php

namespace App\AccountBundle\Application\DTO;

class AccountListResponse
{
    protected int $total;
    protected int $page;
    protected int $limit;

    /** @var Account[] */
    protected array $accounts;

    /**
     * @param int $total
     * @param int $page
     * @param int $limit
     * @param Account[] $accounts
     */
    public function __construct(int $total, int $page, int $limit, array $accounts)
    {
        $this->total = $total;
        $this->page = $page;
        $this->limit = $limit;
        $this->accounts = $accounts;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getAccounts(): array
    {
        return $this->accounts;
    }

    public function toArray(): array
    {
        $accounts = [];
        foreach ($this->accounts as $account) {
            $accounts[] = $account->toArray();
        }
        return [
            'total' => $this->total,
            'page' => $this->page,
            'limit' => $this->limit,
            'accounts' => $accounts,
        ];
    }

}