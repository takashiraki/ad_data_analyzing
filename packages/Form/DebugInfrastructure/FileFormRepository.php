<?php

namespace Form\DebugInfrastructure;

use Form\Domain\Form\FormName;
use Form\Domain\Form\Form;
use Form\Domain\Form\FormDirectory;
use Form\Domain\Form\FormRepositoryInterface;

class FileFormRepository implements FormRepositoryInterface
{
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
}
