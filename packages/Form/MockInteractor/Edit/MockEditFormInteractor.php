<?php

namespace Form\MockInteractor\Edit;

use Form\Domain\DomainService\FormDomainService;
use Form\Domain\Form\FormId;
use Form\Domain\Form\FormRepositoryInterface;
use Form\UseCase\EditForm\EditFormUseCaseInterface;
use Form\UseCase\EditForm\Request\EditFormIndexRequest;
use Form\UseCase\EditForm\Response\EditFormIndexResponse;
use UnexpectedValueException;

class MockEditFormInteractor implements EditFormUseCaseInterface
{
    private $domain_service;
    private $repository;

    public function __construct(
        FormDomainService $service,
        FormRepositoryInterface $repository
    ) {
        $this->domain_service = $service;
        $this->repository = $repository;
    }

    public function index(EditFormIndexRequest $request): EditFormIndexResponse
    {

        if (!$this->domain_service->existById(
            new FormId($request->getFormId())
        )) {
            throw new UnexpectedValueException("This form id dose not exist");
        }
        $form = $this->repository->findById(new FormId($request->getFormId()));

        return new EditFormIndexResponse(
            $form->getFormId()->getValue(),
            $form->getFormName()->getValue(),
            $form->getFormDirectory()->getValue(),
            $form->getFormMemo() !== null ? $form->getFormMemo()->getFormMemo() : null
        );
    }
}
