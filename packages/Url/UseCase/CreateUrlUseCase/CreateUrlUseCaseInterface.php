<?php

namespace Url\UseCase\CreateUrlUseCase;

use Url\UseCase\CreateUrlUseCase\Request\CreateUrlHandleRequest;
use Url\UseCase\CreateUrlUseCase\Response\CreateUrlHandleResponse;
use Url\UseCase\CreateUrlUseCase\Response\CreateUrlIndexResponse;

interface CreateUrlUseCaseInterface
{
    public function index(): CreateUrlIndexResponse;

    public function handle(CreateUrlHandleRequest $request): CreateUrlHandleResponse;
}
