<?php

namespace User\Domain\DomainService;

use User\Domain\User\UserRepositoryInterface;

class UserDomainService
{
    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
