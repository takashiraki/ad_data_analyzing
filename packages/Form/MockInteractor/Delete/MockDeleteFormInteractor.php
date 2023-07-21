<?php

namespace Form\MockInteractor\Delete;

use Form\Domain\DomainService\FormDomainService;
use Form\Domain\Form\FormId;
use Form\Domain\Form\FormRepositoryInterface;
use Form\UseCase\DeleteForm\DeleteFormUseCaseInterface;
use Form\UseCase\DeleteForm\Request\DeleteFormHandleRequest;
use Form\UseCase\DeleteForm\Request\DeleteFormIndexRequest;
use Form\UseCase\DeleteForm\Response\DeleteFormHandleResponse;
use Form\UseCase\DeleteForm\Response\DeleteFormIndexResponse;
use UnexpectedValueException;

class MockDeleteFormInteractor implements DeleteFormUseCaseInterface
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

    public function index(DeleteFormIndexRequest $request): DeleteFormIndexResponse
    {
        if (!$this->domain_service->existById(new FormId($request->getFormId()))) {
            throw new UnexpectedValueException("This form dose not exist");
        }

        $form = $this->repository->findById(new FormId($request->getFormId()));

        return new DeleteFormIndexResponse(
            $form->getFormId()->getValue(),
            $form->getFormName()->getValue(),
            $form->getFormDirectory()->getValue(),
            $form->getFormMemo() !== null ? $form->getFormMemo()->getFormMemo() : null
        );
    }

    public function handle(DeleteFormHandleRequest $request): DeleteFormHandleResponse
    {
        $form_id = new FormId($request->getFormId());

        if (!$this->domain_service->existById($form_id)) {
            throw new UnexpectedValueException("This form dose not exist");
        }

        $form = $this->repository->findById($form_id);
        $this->repository->delete($form);

        return new DeleteFormHandleResponse(
            $form->getFormId()->getValue(),
            $form->getFormName()->getValue(),
            $form->getFormDirectory()->getValue(),
            $form->getFormMemo() !== null ? $form->getFormMemo()->getFormMemo() : null
        );
    }
}
