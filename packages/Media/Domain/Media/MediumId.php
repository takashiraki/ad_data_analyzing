<?php

namespace Media\Domain\Media;

use InvalidArgumentException;
use LengthException;

/**
 * --- ValueObject of medium id. ---
 */
class MediumId
{

    /**
     * Medium Id.
     *
     * @var [type]
     */
    private $medium_id;

    /**
     * Number of characters for a medium id.
     */
    const LENGTH = 36;


    /**
     * Constructer.
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
        $this->medium_id = $value;
    }
}
