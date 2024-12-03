<?php

namespace App\AccountBundle\Application\Command\CreateAccount;

use App\AccountBundle\Application\DTO\CreateAccountResponse;
use App\AccountBundle\Domain\Service\AccountRegisterService;

class CreateAccountHandler
{
    public function __construct(readonly private AccountRegisterService $accountRegisterService)
    {
    }

    public function __invoke(CreateAccountCommand $command): CreateAccountResponse
    {
        $success = $this->accountRegisterService->register(
            $command->getLogin(),
            $command->getPassword()
        );
        if ($success) {
            return new CreateAccountResponse($success);
        } else {
            $errors = $this->accountRegisterService->getMessages();
            return new CreateAccountResponse($success, $errors);
        }
    }
}