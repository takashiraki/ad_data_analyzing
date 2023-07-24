<?php

namespace User\Domain\User;

interface UserRepositoryInterface
{

    public function save(User $user): User;

    public function findById(UserId $id): ?User;

    public function findByEmail(Email $email): ?User;
}
