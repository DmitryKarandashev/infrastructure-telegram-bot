<?php

namespace App\AccountBundle\Domain\Service;

use App\AccountBundle\Domain\Model\Account;
use App\AccountBundle\Domain\Repository\AccountRepositoryInterface;

class AccountRegisterService
{
    protected array $messages = [];


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
            $this->messages[] = "Login {$login} already exists.";
            return false;
        }

        $account = new Account(
            $login,
            $this->passwordHasher->hash($password)
        );

        try {
            $this->accountRepository->save($account);
        } catch (\Throwable $e) {
            $this->messages[] = $e->getMessage();
            return false;
        }
        return true;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }
}