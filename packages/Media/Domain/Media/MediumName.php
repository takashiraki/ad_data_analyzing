<?php

namespace Media\Domain\Media;

use Basic\DomainService\StringValueObject;
use InvalidArgumentException;
use LengthException;

/**
 * --------------------------------------------------------------------------
 * # ValueObject of medium name
 * --------------------------------------------------------------------------
 */
class MediumName extends StringValueObject
{

    /**
     * # Maximum number of characters for the Medium name.
     */
    private const MAX_LENGTH = 30;


    /**
     * # Minimum number of characters for the Medium name.
     */
    private const MIN_LENGTH = 1;


    /**
     * # Constructer.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (empty($value) || trim($value) === '') {
            throw new InvalidArgumentException('Medium name need any characters');
        }

        if (mb_strlen($value) < self::MIN_LENGTH || self::MAX_LENGTH < mb_strlen($value)) {
            throw new LengthException('Medium name must be between 1 and 30 characters long');
        }

        parent::__construct($value);
    }
}
