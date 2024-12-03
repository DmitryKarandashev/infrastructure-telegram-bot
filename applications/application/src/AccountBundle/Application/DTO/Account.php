<?php

namespace App\AccountBundle\Application\DTO;

class Account
{
    protected int $id;
    protected string $login;

    /**
     * @param int $id
     * @param string $login
     */
    public function __construct(int $id, string $login)
    {
        $this->id = $id;
        $this->login = $login;
    }


    public function getId(): int
    {
        return $this->id;
    }
    public function getLogin(): string
    {
        return $this->login;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'login' => $this->login,
        ];
    }
}