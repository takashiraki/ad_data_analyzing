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
     * # Medium name.
     *
     * @var string
     */
    private $medium_name;


    /**
     * # Maximum number of characters for the Medium name.
     */
    const MAXIMUM_NUMBER_OF_CHARACTERS = 30;


    /**
     * # Minimum number of characters for the Medium name.
     */
    const MINIMUM_NUMBER_OF_CHARACTERS = 1;


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

        if (mb_strlen($value) < self::MINIMUM_NUMBER_OF_CHARACTERS || self::MAXIMUM_NUMBER_OF_CHARACTERS < mb_strlen($value)) {
            throw new LengthException('Medium name must be between 1 and 30 characters long');
        }

        parent::__construct($value);

        $this->medium_name = $value;
    }


    /**
     * # Getter of medium name.
     *
     * @return string
     */
    public function getMediumName(): string
    {
        return $this->medium_name;
    }
}
