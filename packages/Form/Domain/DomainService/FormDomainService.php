<?php

namespace Form\Domain\DomainService;

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
}
