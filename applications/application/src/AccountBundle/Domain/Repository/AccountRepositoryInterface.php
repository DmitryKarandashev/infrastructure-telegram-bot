<?php

namespace App\AccountBundle\Domain\Repository;


use App\AccountBundle\Domain\Model\Account;

interface AccountRepositoryInterface
{
    public function findById(string $id): ?Account;

    public function findByLogin(string $login): ?Account;

    public function findByEmail(?string $email): ?Account;

    public function save(Account $user): void;

    public function delete(Account $user): void;

    public function findAll(int $page = 1, int $offset = 0, int $limit = 100, array $params = []): array;
}