<?php

namespace App\AccountBundle\Infrastructure\Service;

use App\AccountBundle\Domain\Model\Account;
use App\AccountBundle\Domain\Service\AccountPasswordHasherInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PasswordHasherService implements AccountPasswordHasherInterface
{
    protected UserPasswordHasherInterface $hasher;

    public function __construct(
        UserPasswordHasherInterface $passwordHasher
    )
    {
        $this->hasher = $passwordHasher;
    }

    public function hash(Account $account, string $plainPassword): string
    {
        return $this->hasher->hashPassword($account, $plainPassword);
    }

    public function verify(Account $account, string $plainPassword): bool
    {
        return $this->hasher->isPasswordValid($account, $plainPassword);
    }
}