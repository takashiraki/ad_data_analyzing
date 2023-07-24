<?php

namespace User\Domain\User;

use Basic\DomainService\StringValueObject;
use InvalidArgumentException;

class Privilege extends StringValueObject
{

    private $privileges = [
        "admin",
        "agency",
        "owner",
        "affiliater"
    ];

    public function __construct(string $privilege)
    {
        if (empty($privilege) || trim($privilege) == '') {
            throw new InvalidArgumentException("Privilege need any value");
        }

        if (!in_array($privilege, $this->privileges)) {
            throw new InvalidArgumentException("This account privilege is bad privilege");
        }

        parent::__construct($privilege);
    }
}
