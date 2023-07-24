<?php

namespace User\Domain\User;

use Illuminate\Hashing\BcryptHasher;

class PasswordHasher
{
    private $hasher;

    public function __construct()
    {
        $this->hasher = new BcryptHasher();
    }

    public function make(string $raw_password): PasswordHash
    {
        $raw_password_hasher = $this->hasher->make($raw_password);
        return new PasswordHash($raw_password_hasher);
    }
}
