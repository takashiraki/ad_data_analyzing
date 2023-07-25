<?php

namespace User\Domain\User;

interface UserRepositoryInterface
{

    public function save(User $user): User;

    public function update(User $user): User;

    public function delete(User $user): User;

    public function search(?UserName $name, ?Email $email, ?Privilege $privilege): ?array;

    public function findById(UserId $id): ?User;

    public function findByEmail(Email $email): ?User;
}
