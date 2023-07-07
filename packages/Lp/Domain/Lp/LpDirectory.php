<?php

namespace Lp\Domain\Lp;

use Basic\DomainService\StringValueObject;
use InvalidArgumentException;
use LengthException;

class LpDirectory extends StringValueObject
{

    private const MIN_LENGTH = 1;
    private const MAX_LENGTH = 10;
    public function __construct(string $value)
    {
        $length = mb_strlen($value);

        if (empty($value) || trim($value) === '') {
            throw new InvalidArgumentException("Lp directory need any value");
        }

        if ($value < self::MIN_LENGTH || self::MAX_LENGTH < $length) {
            throw new LengthException("Lp directory must be between 1 and 10 characters long");
        }

        parent::__construct($value);
    }
}
