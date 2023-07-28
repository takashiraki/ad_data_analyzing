<?php

namespace Url\DebugInfrastructure;

use Url\Domain\Url\UrlName;
use Url\Domain\Url\Url;
use Url\Domain\Url\UrlRepositoryInterface;

class FileRepository implements UrlRepositoryInterface
{
    public function getAllMedia(): ?array
    {
        return null;
    }

    public function getAllMediaDtls(): ?array
    {
        return null;
    }

    public function getAllLps(): ?array
    {
        return null;
    }

    public function getAllForms(): ?array
    {
        return null;
    }

    public function findByName(UrlName $name): ?Url
    {
        return null;
    }

    public function save(Url $url): Url
    {
        return $url;
    }
}
