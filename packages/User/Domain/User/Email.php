<?php

namespace User\Domain\User;

use Basic\DomainService\StringValueObject;
use InvalidArgumentException;
use LengthException;

class Email extends StringValueObject
{
    private const MIN_LENGTH = 1;
    private const MAX_LENGTH = 256;

    public function __construct(string $email)
    {
        if (empty($email) || trim($email) === '') {
            throw new InvalidArgumentException("Email need any value");
        }

        if (mb_strlen($email) < self::MIN_LENGTH  || self::MAX_LENGTH < mb_strlen($email)) {
            throw new LengthException("Email must be between 1 and 256 characters long");
        }

        parent::__construct($email);
    }
}
