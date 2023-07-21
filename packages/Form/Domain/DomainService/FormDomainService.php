<?php

namespace Form\Domain\DomainService;

use Form\Application\Services\OldForm\OldForm;
use Form\Domain\Form\Form;
use Form\Domain\Form\FormDirectory;
use Form\Domain\Form\FormId;
use Form\Domain\Form\FormName;
use Form\Domain\Form\FormRepositoryInterface;

class FormDomainService
{
    private $repository;

    public function __construct(FormRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function existById(FormId $id): bool
    {
        return $this->repository->findById($id) !== null ? true : false;
    }

    public function existByName(FormName $name): bool
    {
        return $this->repository->findByName($name) !== null ? true : false;
    }

    public function existByDirectory(FormDirectory $dir): bool
    {
        return $this->repository->findByDirectory($dir) !== null ? true : false;
    }

    public function equalByName(Form $new_form, OldForm $old_form)
    {
        $old_name = $old_form->getOldForm()->getFormName();
        $new_name = $new_form->getFormName();

        return $old_name->equals($new_name);
    }

    public function equalBydirectory(Form $new_form, OldForm $old_form)
    {
        $old_dir = $old_form->getOldForm()->getFormDirectory();
        $new_dir = $new_form->getFormDirectory();

        return $old_dir->equals($new_dir);
    }
}
