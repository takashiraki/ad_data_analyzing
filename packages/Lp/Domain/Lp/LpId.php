<?php

namespace Lp\Domain\Lp;

use Basic\DomainService\StringValueObject;
use InvalidArgumentException;
use LengthException;

class LpId extends StringValueObject
{
    private const LENGTH = 36;

    public function __construct(string $value)
    {
        if (empty($value) || trim($value) === '') {
            throw new InvalidArgumentException("Lp name need any characters");
        }

        if (mb_strlen($value) !== self::LENGTH) {
            throw new LengthException("Lp id must be 36 characters in length");
        }

        parent::__construct($value);
    }
}
