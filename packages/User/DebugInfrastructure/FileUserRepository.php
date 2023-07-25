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

    public function search(?UserName $name, ?Email $email, ?Privilege $privilege): ?array
    {
        $users = [

            0 => [
                'user_id' => '7bbc275b-b13b-433b-890e-e986b7c28977',
                'user_name' => 'hoge01',
                'email' => 'hoge01@hoge.hoge',
                'privilege' => 'admin',
                'password_hash' => 'hogehogehogeohge'
            ],
            1 => [
                'user_id' => '7bbc275b-b13b-433b-890e-e986b7c28977',
                'user_name' => 'hoge02',
                'email' => 'hoge02@hoge.hoge',
                'privilege' => 'agency',
                'password_hash' => 'fugadfugafugafuga',
            ],
        ];

        $records = [];

        foreach ($users as $value) {
            $records[] = new User(
                new UserId($value['user_id']),
                new UserName($value['user_name']),
                new Privilege($value['privilege']),
                new Email($value['email']),
                new PasswordHash($value['password_hash']),
            );
        }

        return $records;
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
