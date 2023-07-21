<?php

namespace Form\Application\Services\OldForm;

use Form\Domain\Form\Form;

class OldForm
{
    private $old_form;

    public function __construct(Form $form)
    {
        $this->old_form = $form;
    }

    public function getOldForm(): Form
    {
        return $this->old_form;
    }
}
