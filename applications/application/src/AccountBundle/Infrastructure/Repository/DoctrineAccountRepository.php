<?php

namespace App\AccountBundle\Infrastructure\Repository;

use App\AccountBundle\Domain\Model\Account;
use App\AccountBundle\Domain\Repository\AccountRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;

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
        try {
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            throw new \RuntimeException('Failed to save the account.', 0, $e);
        }
    }

    public function delete(Account $user): void
    {
        try {
            $this->entityManager->remove($user);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            throw new \RuntimeException('Failed to delete the account.', 0, $e);
        }
    }
}