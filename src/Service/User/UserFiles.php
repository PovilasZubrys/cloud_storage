<?php

declare(strict_types=1);

namespace App\Service\User;

use PhpCsFixer\Finder;

class UserFiles
{
    public function getUserFile(string $fileName, object $user): string
    {
        return $_ENV['STORAGE_MOUNT'] . '/' . $user->getMainDirectory() . '/' . $fileName;
    }

    public function getMainDirectoryFilePath(object $user): string
    {
        return $_ENV['STORAGE_MOUNT'] . '/' . $user->getMainDirectory();
    }

    public function findFiles(string $directory): object
    {
        return (new Finder())->files()->in($directory)->depth(0);
    }

    public function findDirectories(string $directory): object
    {
        return (new Finder())->directories()->in($directory)->depth(0);
    }
}