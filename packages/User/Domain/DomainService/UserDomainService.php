<?php

namespace User\Domain\DomainService;

use User\Domain\User\Email;
use User\Domain\User\PasswordHasher;
use User\Domain\User\UserId;
use User\Domain\User\UserRepositoryInterface;

class UserDomainService
{
    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function existById(UserId $id): bool
    {
        return $this->repository->findById($id) !== null
            ? true : false;
    }

    public function existByEmail(Email $email): bool
    {
        return $this->repository->findByEmail($email) !== null
            ? true : false;
    }

    public function equalByEmail(Email $email, OldEmail $old_email)
    {
        return $old_email->getOldEmail()->equals($email);
    }

    public function createHasedPassword(RawPassword $raw_password)
    {
        $hasher = new PasswordHasher();

        return $hasher->make($raw_password->getRawPassword());
    }
}
