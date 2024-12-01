<?php

namespace App\AccountBundle\Infrastructure\Service;

use App\AccountBundle\Domain\Service\AccountPasswordHasherInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;

class PasswordHasherService implements AccountPasswordHasherInterface
{
    public function __construct(readonly private PasswordHasherInterface $passwordHasher)
    {
    }

    public function hash(string $plainPassword): string
    {
        return $this->passwordHasher->hash($plainPassword);
    }

    public function verify(string $hashedPassword, string $plainPassword): bool
    {
        return $this->passwordHasher->verify($hashedPassword, $plainPassword);
    }
}