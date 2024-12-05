<?php

namespace App\AccountBundle\Domain\Service;

use App\AccountBundle\Domain\Model\Account;
use App\AccountBundle\Domain\Repository\AccountRepositoryInterface;

class AccountRegisterService
{
    protected array $messages = [];

    protected AccountPasswordHasherInterface $hasher;

    protected AccountRepositoryInterface $repository;


    public function __construct(
        AccountPasswordHasherInterface $passwordHasher,
        AccountRepositoryInterface $accountRepository,
    )
    {
        $this->hasher = $passwordHasher;
        $this->repository = $accountRepository;
    }

    public function register(
        string $login,
        string $password,
    ): bool {
        if ($this->repository->findByLogin($login)) {
            $this->messages[] = "Login {$login} already exists.";
            return false;
        }

        $account = new Account($login);

        $password = $this->hasher->hash($account, $password);
        $account->setPassword($password);
        $account->setRoles(['ROLE_USER']);

        try {
            $this->repository->save($account);
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