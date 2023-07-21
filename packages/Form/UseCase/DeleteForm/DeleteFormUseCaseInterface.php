<?php

namespace Form\UseCase\DeleteForm;

use Form\UseCase\DeleteForm\Request\DeleteFormHandleRequest;
use Form\UseCase\DeleteForm\Request\DeleteFormIndexRequest;
use Form\UseCase\DeleteForm\Response\DeleteFormHandleResponse;
use Form\UseCase\DeleteForm\Response\DeleteFormIndexResponse;

interface DeleteFormUseCaseInterface
{
    public function index(DeleteFormIndexRequest $request): DeleteFormIndexResponse;

    public function handle(DeleteFormHandleRequest $request): DeleteFormHandleResponse;
}
