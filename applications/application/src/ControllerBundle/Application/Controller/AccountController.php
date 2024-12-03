<?php

namespace App\ControllerBundle\Application\Controller;

use App\AccountBundle\Application\Command\AccountList\AccountListCommand;
use App\AccountBundle\Application\Command\AccountList\AccountListHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('api/v1/json/account')]
class AccountController extends AbstractController
{

    #[Route('/list', name: 'account_list', methods: ['GET'])]
    public function getAccountList(): JsonResponse
    {
        $result = new AccountListHandler;
        dd($result(new AccountListCommand(0, 1, null)));
        return $this->json([]);
    }

}