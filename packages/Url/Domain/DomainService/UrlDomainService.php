<?php

namespace Url\Domain\DomainService;

use Url\Domain\Url\UrlId;
use Url\Domain\Url\UrlName;
use Url\Domain\Url\UrlRepositoryInterface;

class UrlDomainService
{
    private $repository;

    public function __construct(UrlRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function existById(UrlId $id): bool
    {
        return $this->repository->findById($id) !== null ?
            true : false;
    }

    public function existByName(UrlName $name): bool
    {
        return $this->repository->findByName($name) !== null ?
            true : false;
    }
}
