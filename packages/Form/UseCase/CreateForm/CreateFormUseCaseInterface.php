<?php

namespace Form\UseCase\CreateForm;

use Form\UseCase\CreateForm\Request\CreateFormHandleRequest;
use Form\UseCase\CreateForm\Response\CreateFormHandleResponse;

interface CreateFormUseCaseInterface
{
    public function handle(CreateFormHandleRequest $request): CreateFormHandleResponse;
}
