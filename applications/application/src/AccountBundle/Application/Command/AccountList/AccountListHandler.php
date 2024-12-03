<?php

namespace App\AccountBundle\Application\Command\AccountList;

use App\AccountBundle\Application\DTO\AccountListResponse;

class AccountListHandler
{
    public function __invoke(AccountListCommand $command): AccountListResponse
    {
        return new AccountListResponse(0, 0, 0, []);
    }


}