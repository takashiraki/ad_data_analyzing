<?php

namespace Form\Domain\Form;

use Basic\DomainService\StringValueObject;
use InvalidArgumentException;
use LengthException;

class FormDirectory extends StringValueObject
{
    private $form_directory;

    private const MIN_LENGTH = 1;
    private const MAX_LENGTH = 10;

    public function __construct(string $dir)
    {
        if (empty($dir) || trim($dir) === '') {
            throw new InvalidArgumentException("Lp directory need any value");
        }

        if (mb_strlen($dir) < self::MIN_LENGTH || self::MAX_LENGTH < mb_strlen($dir)) {
            throw new LengthException("Form directory must be between 1 and 50 characters long");
        }

        parent::__construct($dir);
    }
}
