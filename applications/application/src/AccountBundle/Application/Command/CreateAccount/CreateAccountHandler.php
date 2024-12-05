<?php

namespace App\AccountBundle\Application\Command\CreateAccount;

use App\AccountBundle\Application\DTO\CreateAccountResponse;
use App\AccountBundle\Domain\Service\AccountRegisterService;

class CreateAccountHandler
{

    private AccountRegisterService $service;

    public function __construct(
        AccountRegisterService $accountRegisterService
    )
    {
        $this->service = $accountRegisterService;
    }

    public function __invoke(CreateAccountCommand $command): CreateAccountResponse
    {
        $success = $this->service->register(
            $command->getLogin(),
            $command->getPassword()
        );
        if ($success) {
            return new CreateAccountResponse($success);
        } else {
            $errors = $this->service->getMessages();
            return new CreateAccountResponse($success, $errors);
        }
    }
}