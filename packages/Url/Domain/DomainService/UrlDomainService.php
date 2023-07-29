<?php

namespace Url\Domain\DomainService;

use Url\Domain\DomainService\ValueObject\OldUrlName;
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

    public function equalByName(OldUrlName $old_name, UrlName $new_name): bool
    {
        return $old_name->getOldUrlName()->equals($new_name);
    }
}
