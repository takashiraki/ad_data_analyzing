<?php

namespace Media\Domain\Media;

use InvalidArgumentException;
use LengthException;
use Basic\DomainService\StringValueObject;

/**
 * --------------------------------------------------------------------------
 * # ValueObject of medium id
 * --------------------------------------------------------------------------
 */
class MediumId extends StringValueObject
{

    /**
     * # Medium Id.
     *
     * @var string
     */
    private $medium_id;

    /**
     * # Number of characters for a medium id.
     */
    const LENGTH = 36;


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

        $this->medium_id = $value;
    }


    /**
     * # Getter of medium id.
     *
     * @return string
     */
    public function getMediumId()
    {
        return $this->medium_id;
    }
}
