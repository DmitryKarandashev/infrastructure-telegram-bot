<?php

namespace App\ControllerBundle\Application\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ExampleController extends AbstractController
{
    #[Route('/example', name: 'example_route')]
    public function index(): Response
    {
        return new Response('Hello from ExampleController');
    }
}
