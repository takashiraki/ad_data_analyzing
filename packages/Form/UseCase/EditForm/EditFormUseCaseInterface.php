<?php

namespace Form\UseCase\EditForm;

use Form\UseCase\EditForm\Request\EditFormIndexRequest;
use Form\UseCase\EditForm\Response\EditFormIndexResponse;

interface EditFormUseCaseInterface
{
    public function index(EditFormIndexRequest $request): EditFormIndexResponse;
}
