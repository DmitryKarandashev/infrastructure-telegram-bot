<?php

namespace App\AccountBundle\Application\Command;

use App\AccountBundle\Application\DTO\RegisterAccountResponse;
use App\AccountBundle\Domain\Service\AccountRegisterService;

class RegisterAccountHandler
{


    public function __construct(readonly private AccountRegisterService $accountRegisterService)
    {
    }

    public function __invoke(RegisterAccountCommand $command): RegisterAccountResponse
    {
        $success = $this->accountRegisterService->register(
            $command->getLogin(),
            $command->getPassword()
        );
        if ($success) {
            return new RegisterAccountResponse($success);
        } else {
            $errors = $this->accountRegisterService->getMessages();
            return new RegisterAccountResponse($success, $errors);
        }
    }


}