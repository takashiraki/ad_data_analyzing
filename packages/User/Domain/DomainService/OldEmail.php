<?php

namespace User\Domain\DomainService;

use User\Domain\User\Email;

class OldEmail
{
    private $email;

    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    public function getOldEmail(): Email
    {
        return $this->email;
    }
}
