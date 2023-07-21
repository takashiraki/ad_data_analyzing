<?php

namespace User\Domain\User;

use Basic\DomainService\StringValueObject;
use InvalidArgumentException;
use LengthException;

class UserId extends StringValueObject
{
    private const LENGTH = 36;
    public function __construct(string $id)
    {
        if (trim($id) === '' || empty($id)) {
            throw new InvalidArgumentException("UserId need any value");
        }

        if (mb_strlen($id) !== self::LENGTH) {
            throw new LengthException("UserId must be 36 characters in length");
        }

        parent::__construct($id);
    }
}
