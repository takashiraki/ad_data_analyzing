<?php

namespace Form\Domain\Form;

use Basic\DomainService\StringValueObject;
use InvalidArgumentException;
use LengthException;

class FormId extends StringValueObject
{
    private const LENGTH = 36;
    private $form_id;

    public function __construct(string $id)
    {
        if (empty($id) || trim($id) === '') {
            throw new InvalidArgumentException("Lp id need any value");
        }

        if (mb_strlen($id) !== self::LENGTH) {
            throw new LengthException("Form id must be 36 characters in length");
        }

        parent::__construct($id);
    }
}
