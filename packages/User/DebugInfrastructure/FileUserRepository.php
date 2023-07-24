<?php

namespace User\DebugInfrastructure;

use User\Domain\User\Email;
use User\Domain\User\User;
use User\Domain\User\UserRepositoryInterface;

class FileUserRepository implements UserRepositoryInterface
{
    public function save(User $user): User
    {
        return $user;
    }

    public function findByEmail(Email $email): ?User
    {
        return null;
    }
}
