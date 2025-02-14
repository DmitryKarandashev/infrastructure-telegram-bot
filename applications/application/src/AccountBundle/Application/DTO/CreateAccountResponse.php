<?php

namespace App\AccountBundle\Application\DTO;

class CreateAccountResponse
{
    protected bool $success;
    protected array $errors;

    public function __construct(
        bool  $success,
        array $errors = []
    )
    {
        $this->success = $success;
        $this->errors = $errors;
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function toArray(): array
    {
        return [
            'success' => $this->success,
            'errors' => $this->errors,
        ];
    }
}
