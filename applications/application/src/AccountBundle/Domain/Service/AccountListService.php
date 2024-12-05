<?php

namespace App\AccountBundle\Domain\Service;

use App\AccountBundle\Domain\Repository\AccountRepositoryInterface;

class AccountListService
{


    private AccountRepositoryInterface $repository;

    public function __construct(
        AccountRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }

    public function getAccountList(
        int $offset = 0,
        int $page = 1,
        int $limit = 100,
    ): array {
        $this->repository->findAll(
            $offset,
            $page,
            $limit
        );
        return [];
    }

}