<?php

namespace Url\Domain\Url;

use Basic\DomainService\StringValueObject;
use InvalidArgumentException;
use LengthException;

class UrlName extends StringValueObject
{
    private const MIN_LENGTH = 1;
    private const MAX_LENGTH = 50;

    public function __construct(string $name)
    {
        if (empty($name) || trim($name) === '') {
            throw new InvalidArgumentException("Url name need any value");
        }

        if (mb_strlen($name) < self::MIN_LENGTH || self::MAX_LENGTH < mb_strlen($name)) {
            throw new LengthException("Url name must be between 1  and 50 chatacters long");
        }

        parent::__construct($name);
    }
}
