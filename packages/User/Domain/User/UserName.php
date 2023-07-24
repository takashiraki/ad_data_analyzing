<?php

namespace User\Domain\User;

use Basic\DomainService\StringValueObject;
use InvalidArgumentException;
use LengthException;

class UserName extends StringValueObject
{
    private const MIN_LENGTH = 1;
    private const MAX_LENGTH = 30;

    public function __construct(string $name)
    {
        if (empty($name) || trim($name) === '') {
            throw new InvalidArgumentException("User name need any value");
        }

        if (mb_strlen($name) < self::MIN_LENGTH || self::MAX_LENGTH < mb_strlen($name)) {
            throw new LengthException("User name must be between 1 and 30 characters long");
        }

        parent::__construct($name);
    }
}
