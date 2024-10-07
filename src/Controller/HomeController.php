<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(UserInterface $user): Response
    {
        return $this->render('home/index.html.twig', [
            'email' => $user->getUserIdentifier(),
            'controller_name' => 'HomeController',
        ]);
    }
}
