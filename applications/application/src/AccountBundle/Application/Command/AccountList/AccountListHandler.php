<?php

namespace App\AccountBundle\Application\Command\AccountList;

use App\AccountBundle\Application\DTO\AccountListResponse;
use App\AccountBundle\Domain\Service\AccountListService;

class AccountListHandler
{
    protected AccountListService $service;


    /**
     * @param AccountListService $service
     */
    public function __construct(
        AccountListService $service
    )
    {
        $this->service = $service;
    }

    public function __invoke(AccountListCommand $command): AccountListResponse
    {
        $this->service->getAccountList($command->getOffset(), $command->getPage(), $command->getLimit());
        return new AccountListResponse(0, 0, 0, []);
    }


}