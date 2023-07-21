<?php

namespace Form\UseCase\DeleteForm\Request;

class DeleteFormHandleRequest
{
    private $form_id;

    public function __construct(string $id)
    {
        $this->form_id = $id;
    }

    public function getFormId(): string
    {
        return $this->form_id;
    }
}
