<?php

namespace Lp\Domain\Lp;

use Basic\DomainService\StringValueObject;
use LengthException;

class LpMemo extends StringValueObject
{
    private const MAX_LENGTH = 50;

    public function __construct(string $value)
    {
        if (self::MAX_LENGTH < mb_strlen($value)) {
            throw new LengthException("LP name must be 36 characters or less");
        }

        parent::__construct($value);
    }
}
