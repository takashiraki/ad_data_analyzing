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
}
