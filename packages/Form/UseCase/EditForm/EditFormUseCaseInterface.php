<?php

namespace Form\UseCase\EditForm;

use Form\UseCase\EditForm\Request\EditFormHandleRequest;
use Form\UseCase\EditForm\Request\EditFormIndexRequest;
use Form\UseCase\EditForm\Response\EditFormHandleResponse;
use Form\UseCase\EditForm\Response\EditFormIndexResponse;

interface EditFormUseCaseInterface
{
    public function index(EditFormIndexRequest $request): EditFormIndexResponse;

    public function handle(EditFormHandleRequest $request): EditFormHandleResponse;
}
