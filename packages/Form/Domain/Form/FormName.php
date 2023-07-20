<?php

namespace Form\Domain\Form;

use Basic\DomainService\StringValueObject;
use InvalidArgumentException;
use LengthException;

class FormName extends StringValueObject
{
    private const MIN_LENGTH = 1;
    private const MAX_LENGTH = 50;

    private $form_name;

    public function __construct(string $name)
    {
        if (empty($name) || trim($name) === '') {
            throw new InvalidArgumentException("Form name need any value");
        }

        if (mb_strlen($name) < self::MIN_LENGTH || self::MAX_LENGTH < mb_strlen($name)) {
            throw new LengthException("Form name must be between 1 and 50 characters long");
        }

        parent::__construct($name);
    }
}
