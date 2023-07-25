<?php

namespace User\DebugInfrastructure;

use User\Domain\User\Email;
use User\Domain\User\PasswordHash;
use User\Domain\User\Privilege;
use User\Domain\User\User;
use User\Domain\User\UserId;
use User\Domain\User\UserName;
use User\Domain\User\UserRepositoryInterface;

class FileUserRepository implements UserRepositoryInterface
{
    public function save(User $user): User
    {
        return $user;
    }

    public function update(User $user): User
    {
        return $user;
    }

    public function delete(User $user): User
    {
        return $user;
    }

    public function findById(UserId $id): ?User
    {
        return new User(
            $id,
            new UserName("hoge"),
            new Privilege("admin"),
            new Email("hogehoge@hogehoge.hogehoge"),
            new PasswordHash("hogehogehogehoge")
        );
    }

    public function findByEmail(Email $email): ?User
    {
        return null;
    }
}
