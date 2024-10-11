<?php

namespace App\Service\User;

class UserDirectoriesGenerator
{
    public function createBaseUserDirectory($user): string
    {
        $directory = $this->generateDirectoryName($user);
        mkdir($_ENV['STORAGE_MOUNT'] . '/' . $directory);

        return $directory;
    }

    private function generateDirectoryName(object $user): string
    {
        return hash('sha256', $user->getId() . $user->getEmail());
    }
}