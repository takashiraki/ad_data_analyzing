<?php

namespace Form\Domain\Form;

class Form
{
    private $form_id;
    private $form_name;
    private $form_directory;
    private $form_memo;

    public function __construct(
        FormId $id,
        FormName $name,
        FormDirectory $directory,
        ?FormMemo $memo,
    ) {
        $this->form_id = $id;
        $this->form_name = $name;
        $this->form_directory = $directory;
        $this->form_memo = $memo;
    }

    public function getFormLp(): FormId
    {
        return $this->form_id;
    }

    public function getFormName(): FormName
    {
        return $this->form_name;
    }

    public function getFormDirectory(): FormDirectory
    {
        return $this->form_directory;
    }

    public function getFormMemo(): ?FormMemo
    {
        return $this->form_memo;
    }
};
