<?php

namespace Lp\Domain\Lp;

use Basic\DomainService\StringValueObject;
use InvalidArgumentException;
use LengthException;

class LpName extends StringValueObject
{
    private const MIN_LENGTH = 1;
    private const MAX_LENGTH = 50;

    public function __construct(string $value)
    {
        $length = mb_strlen($value);

        if (empty($value) || trim($value) === '') {
            throw new InvalidArgumentException("Lp name must be any value");
        }

        if ($length < self::MIN_LENGTH || self::MAX_LENGTH < $length) {
            throw new LengthException("Lp directory must be between 1 and 50 characters long");
        }

        parent::__construct($value);
    }
}
