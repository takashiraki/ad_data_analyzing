<?php

namespace Form\MockInteractor\Create;

use Form\Domain\DomainService\FormDomainService;
use Form\Domain\Form\Form;
use Form\Domain\Form\FormDirectory;
use Form\Domain\Form\FormId;
use Form\Domain\Form\FormMemo;
use Form\Domain\Form\FormName;
use Form\Domain\Form\FormRepositoryInterface;
use Form\UseCase\CreateForm\CreateFormUseCaseInterface;
use Form\UseCase\CreateForm\Request\CreateFormHandleRequest;
use Form\UseCase\CreateForm\Response\CreateFormHandleResponse;
use UnexpectedValueException;
use illuminate\Support\Str;

class MockCreateFormInteractor implements CreateFormUseCaseInterface
{
    private $repository;
    private $domain_service;

    public function __construct(
        FormDomainService $service,
        FormRepositoryInterface $repository
    ) {
        $this->domain_service = $service;
        $this->repository = $repository;
    }
    public function handle(CreateFormHandleRequest $request): CreateFormHandleResponse
    {
        if ($this->domain_service->existByName(
            new FormName($request->getFormName())
        )) {
            throw new UnexpectedValueException("This form name already existed");
        }

        if ($this->domain_service->existByDirectory(
            new FormDirectory($request->getFormDirectory())
        )) {
            throw new UnexpectedValueException("This form directory already existed");
        }

        $form = new Form(
            new FormId((string)Str::uuid()),
            new FormName($request->getFormName()),
            new FormDirectory($request->getFormDirectory()),
            $request->getFormMemo() === null ? null : new FormMemo($request->getFormMemo())
        );

        $this->repository->save($form);

        return new CreateFormHandleResponse(
            $form->getFormName()->getValue(),
            $form->getFormDirectory()->getValue(),
            $form->getFormMemo() === null ? null : $form->getFormMemo()->getFormMemo()
        );
    }
}
