<?php

namespace App\Controller;

use App\Service\User\UserFiles;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class HomeController extends AbstractController
{
    #[Route('/{directory}', name: 'app_home')]
    public function index(UserInterface $user, UserFiles $userFiles, $directory = null): Response
    {
        if (empty($directory)) {
            $directory = $userFiles->getMainDirectoryFilePath($user);
        }

        $files = $userFiles->findFiles($directory);
        $directories = $userFiles->findDirectories($directory);

        return $this->render('home/index.html.twig', [
            'email' => $user->getUserIdentifier(),
            'files' => $files,
            'directories' => $directories,
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/download_file/{fileName}', name: 'app_download_file')]
    public function downloadFile(string $fileName, UserFiles $userFiles, UserInterface $user): Response
    {
        return $this->file($userFiles->getUserFile($fileName, $user));
    }
}
