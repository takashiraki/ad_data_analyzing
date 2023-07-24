<?php

namespace User\Domain\User;

interface UserRepositoryInterface
{

    public function save(User $user): User;

    public function findByEmail(Email $email): ?User;
}
