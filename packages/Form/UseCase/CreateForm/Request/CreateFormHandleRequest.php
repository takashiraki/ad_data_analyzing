<?php

namespace Form\UseCase\CreateForm\Request;

class CreateFormHandleRequest
{
    private $form_name;
    private $form_directory;
    private $form_memo;

    public function __construct(
        string $name,
        string $dir,
        ?string $memo
    ) {
        $this->form_name = $name;
        $this->form_directory = $dir;
        $this->form_memo = $memo;
    }

    public function getFormName(): string
    {
        return $this->form_name;
    }

    public function getFormDirectory(): string
    {
        return $this->form_directory;
    }

    public function getFormMemo(): ?string
    {
        return $this->form_memo;
    }
}
