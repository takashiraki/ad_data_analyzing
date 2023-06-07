<?php

namespace MediaDtl\Domain\MediaDtl;

use Basic\DomainService\StringValueObject;
use InvalidArgumentException;
use LengthException;

class MediumDtlName extends StringValueObject
{

    private const MIN_LENGTH = 1;
    private const MAX_LENGTH = 30;

    public function __construct(string $name)
    {
        if (empty($name) || trim($name) === '') {
            throw new InvalidArgumentException('Medium detail name need any characters');
        }

        if (mb_strlen($name) < self::MIN_LENGTH || self::MAX_LENGTH < mb_strlen($name)) {
            throw new LengthException('Medium detail name must be between 1 and 30characters long');
        }

        parent::__construct($name);
    }
}
