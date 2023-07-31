<?php

namespace Url\UseCase\DeleteUrlUseCase;

use Url\UseCase\DeleteUrlUseCase\Request\DeleteUrlIndexRequest;
use Url\UseCase\DeleteUrlUseCase\Response\DeleteUrlIndexResponse;

interface DeleteUrlUseCaseInterface
{
    public function index(DeleteUrlIndexRequest $request): DeleteUrlIndexResponse;
}
