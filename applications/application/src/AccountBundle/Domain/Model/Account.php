<?php

namespace App\AccountBundle\Domain\Model;

class Account
{
    private string $id;
    private string $login;
    private ?string $name;
    private ?string $patronymic;
    private ?string $surname;
    private ?string $email;
    private string $password;
    private array $roles;

    public function __construct(
        string $id,
        string $login,
        ?string $name,
        ?string $patronymic,
        ?string $surname,
        ?string $email,
        string $password,
        array $roles = []
    ) {
        $this->id = $id;
        $this->login = $login;
        $this->name = $name;
        $this->patronymic = $patronymic;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->roles = $roles;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    public function updatePersonalInfo(?string $name, ?string $patronymic, ?string $surname): void
    {
        $this->name = $name;
        $this->patronymic = $patronymic;
        $this->surname = $surname;
    }

    public function updateLogin(string $login): void
    {
        $this->login = $login;
    }

    public function changePassword(string $newPassword): void
    {
        $this->password = $newPassword;
    }
}