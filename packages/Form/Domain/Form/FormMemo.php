<?php

namespace Form\Domain\Form;

use LengthException;

class FormMemo
{
    private $form_memo;

    private const MAX_LENGTH = 50;

    public function __construct(?String $memo)
    {
        if (self::MAX_LENGTH < mb_strlen($memo)) {
            throw new LengthException("Form memo must be 50 characters or less");
        }

        $this->form_memo = $memo;
    }

    public function getFormMemo(): ?string
    {
        return $this->form_memo;
    }
}
