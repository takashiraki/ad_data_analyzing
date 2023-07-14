<?php

namespace Lp\Domain\Lp;

use Basic\DomainService\StringValueObject;
use LengthException;

class LpMemo
{
    private const MAX_LENGTH = 50;
    private $lp_memo;

    public function __construct(?string $value)
    {
        if (self::MAX_LENGTH < mb_strlen($value)) {
            throw new LengthException("LP name must be 36 characters or less");
        }

        $this->lp_memo = $value;
    }

    public function getLpMemo(): ?string
    {
        return $this->lp_memo;
    }
}
