<?php

namespace User\Domain\User;

use Basic\DomainService\StringValueObject;
use InvalidArgumentException;
use LengthException;

class PasswordHash extends StringValueObject
{
    private const MIN_LENGTH = 8;
    private const MAX_LENGTH = 256;

    public function __construct(string $password)
    {
        if (empty($password) || trim($password) === '') {
            throw new InvalidArgumentException("Password need any value");
        }

        if (mb_strlen($password) < self::MIN_LENGTH || self::MAX_LENGTH < mb_strlen($password)) {
            throw new LengthException("Password must be between 8 and 256 characters long");
        }

        parent::__construct($password);
    }
}
