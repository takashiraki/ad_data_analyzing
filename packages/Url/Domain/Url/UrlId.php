<?php

namespace Url\Domain\Url;

use Basic\DomainService\StringValueObject;
use InvalidArgumentException;
use LengthException;

class UrlId extends StringValueObject
{
    private const LENGTH = 36;

    public function __construct(string $id)
    {
        if (empty($id) || trim($id) === '') {
            throw new InvalidArgumentException("Url id need any value");
        }

        if (mb_strlen($id) !== self::LENGTH) {
            throw new LengthException("Url id must be 36 characters in length");
        }

        parent::__construct($id);
    }
}
