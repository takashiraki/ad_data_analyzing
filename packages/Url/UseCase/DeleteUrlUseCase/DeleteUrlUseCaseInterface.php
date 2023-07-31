<?php

namespace Url\UseCase\DeleteUrlUseCase;

use Url\UseCase\DeleteUrlUseCase\Request\DeleteUrlHandleRequest;
use Url\UseCase\DeleteUrlUseCase\Request\DeleteUrlIndexRequest;
use Url\UseCase\DeleteUrlUseCase\Response\DeleteUrlHandleResponse;
use Url\UseCase\DeleteUrlUseCase\Response\DeleteUrlIndexResponse;

interface DeleteUrlUseCaseInterface
{

    /**
     * Index
     *
     * @param DeleteUrlIndexRequest $request
     * @return DeleteUrlIndexResponse
     */
    public function index(DeleteUrlIndexRequest $request): DeleteUrlIndexResponse;

    public function handle(DeleteUrlHandleRequest $request): DeleteUrlHandleResponse;
}
