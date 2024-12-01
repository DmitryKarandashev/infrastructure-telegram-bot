<?php

namespace App\AccountBundle\Domain\Service;

use App\AccountBundle\Domain\Model\Account;
use App\AccountBundle\Domain\Repository\AccountRepositoryInterface;

class AccountRegisterService
{


    public function __construct(
        private readonly AccountPasswordHasherInterface $passwordHasher,
        private readonly AccountRepositoryInterface $accountRepository,
    )
    {
    }

    public function register(
        string $login,
        string $password,
    ): bool {
        if ($this->accountRepository->findByLogin($login)) {
            return false;
        }

        $account = new Account(
            $login,
            $this->passwordHasher->hash($password)
        );

        try {
            $this->accountRepository->save($account);
        } catch (\Throwable $e) {
            return false;
        }
        return true;
    }
}