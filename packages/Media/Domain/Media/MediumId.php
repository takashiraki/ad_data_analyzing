<?php

namespace Media\Domain\Media;

use Basic\DomainService\StringValueObject;
use InvalidArgumentException;
use LengthException;

/**
 * --------------------------------------------------------------------------
 * # ValueObject of medium id
 * --------------------------------------------------------------------------
 */
class MediumId extends StringValueObject
{
    /**
     * # Number of characters for a medium id.
     */
    private const LENGTH = 36;

    /**
     * # Constructer.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (empty($value) || trim($value) === '') {
            throw new InvalidArgumentException('Medium id need any value');
        }

        if (mb_strlen($value) !== self::LENGTH) {
            throw new LengthException('Medium id must be 36 characters in length');
        }

        parent::__construct($value);
    }
}
