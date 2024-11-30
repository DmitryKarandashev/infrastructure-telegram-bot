<?php

namespace App\AccountBundle\Infrastructure\Repository;

use App\AccountBundle\Domain\Model\Account;
use App\AccountBundle\Domain\Repository\AccountRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineAccountRepository implements AccountRepositoryInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function findById(string $id): ?Account
    {
        return $this->entityManager->getRepository(Account::class)->find($id);
    }

    public function findByLogin(string $login): ?Account
    {
        return $this->entityManager->getRepository(Account::class)->findOneBy(['login' => $login]);
    }

    public function findByEmail(?string $email): ?Account
    {
        return $this->entityManager->getRepository(Account::class)->findOneBy(['email' => $email]);
    }

    public function save(Account $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function delete(Account $user): void
    {
        $this->entityManager->remove($user);
        $this->entityManager->flush();
    }
}