<?php

namespace Form\MockInteractor\Edit;

use Form\Application\Services\OldForm\OldForm;
use Form\Domain\DomainService\FormDomainService;
use Form\Domain\Form\Form;
use Form\Domain\Form\FormDirectory;
use Form\Domain\Form\FormId;
use Form\Domain\Form\FormMemo;
use Form\Domain\Form\FormName;
use Form\Domain\Form\FormRepositoryInterface;
use Form\UseCase\EditForm\EditFormUseCaseInterface;
use Form\UseCase\EditForm\Request\EditFormHandleRequest;
use Form\UseCase\EditForm\Request\EditFormIndexRequest;
use Form\UseCase\EditForm\Response\EditFormHandleResponse;
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

    public function handle(EditFormHandleRequest $request): EditFormHandleResponse
    {
        $form_id = new FormId($request->getFormId());
        if (!$this->domain_service->existById($form_id)) {
            throw new UnexpectedValueException("This form id dose not exist");
        }

        $old_form = new OldForm($this->repository->findById($form_id));
        $new_form = new Form(
            $form_id,
            new FormName($request->getFormName()),
            new FormDirectory($request->getFormDirectory()),
            new FormMemo($request->getFormMemo())
        );

        if (!$this->domain_service->equalByName($new_form, $old_form)) {
            if ($this->domain_service->existByName($new_form->getFormName())) {
                throw new UnexpectedValueException("This form name already existed");
            }
        }

        if (!$this->domain_service->equalBydirectory($new_form, $old_form)) {
            if ($this->domain_service->existByDirectory($new_form->getFormDirectory())) {
                throw new UnexpectedValueException("This form directory already existed");
            }
        }

        $this->repository->update($new_form);

        return new EditFormHandleResponse(
            $new_form->getFormId()->getValue(),
            $new_form->getFormName()->getValue(),
            $new_form->getFormDirectory()->getValue(),
            $new_form->getFormMemo()->getFormMemo()
        );
    }
}
