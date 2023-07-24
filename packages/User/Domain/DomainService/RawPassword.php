<?php

namespace User\Domain\DomainService;

class RawPassword
{
    private $raw_password;

    public function __construct(string $raw_password)
    {
        $this->raw_password = $raw_password;
    }

    public function getRawPassword(): string
    {
        return $this->raw_password;
    }
}
