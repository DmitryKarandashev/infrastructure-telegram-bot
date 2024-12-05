<?php

namespace App\ControllerBundle\Application\Controller;

use App\AccountBundle\Application\Command\AccountList\AccountListCommand;
use App\AccountBundle\Application\Command\AccountList\AccountListHandler;
use App\AccountBundle\Application\Command\CreateAccount\CreateAccountCommand;
use App\AccountBundle\Application\Command\CreateAccount\CreateAccountHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('api/v1/json/account')]
class AccountController extends AbstractController
{

    #[Route('/list', name: 'account_list', methods: ['GET'])]
    public function getAccountList(
        Request $request,
        AccountListHandler $handler
    ): JsonResponse
    {
        $offset = $request->query->get('offset', 0);
        $page = $request->query->get('page', 1);
        $limit = $request->query->get('limit', 100);
        $command = new AccountListCommand($offset, $page, $limit, null);
        $response = $handler($command);
        return $this->json($response->toArray());
    }

    #[Route('/create', name: 'account_create', methods: ['GET'])]
    public function createAccount(
        Request $request,
        CreateAccountHandler $handler
    ): JsonResponse
    {
        $login = $request->query->get('login');
        $password = $request->query->get('password');
        if (empty($login) || empty($password)) {
            return $this->json([]);
        }
        $command = new CreateAccountCommand($login, $password);
        $response = $handler($command);
        return $this->json($response->toArray());
    }

}