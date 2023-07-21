<?php

namespace Form\DebugInfrastructure;

use Form\Domain\Form\FormName;
use Form\Domain\Form\Form;
use Form\Domain\Form\FormDirectory;
use Form\Domain\Form\FormId;
use Form\Domain\Form\FormRepositoryInterface;

class FileFormRepository implements FormRepositoryInterface
{
    public function findById(FormId $id): ?Form
    {
        return new Form(
            $id,
            new FormName('hoge form'),
            new FormDirectory('hoge02'),
            null
        );
    }

    public function findByName(FormName $name): ?Form
    {
        return null;
    }

    public function findByDirectory(FormDirectory $dir): ?Form
    {
        return null;
    }

    public function save(Form $form): Form
    {
        return $form;
    }

    public function update(Form $form): Form
    {
        return $form;
    }
}
