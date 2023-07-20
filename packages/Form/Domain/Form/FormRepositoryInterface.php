<?php

namespace Form\Domain\Form;

interface FormRepositoryInterface
{
    public function findById(FormId $id): ?Form;

    public function findByName(FormName $name): ?Form;

    public function findByDirectory(FormDirectory $dir): ?Form;

    public function save(Form $form): Form;
}
