<?php

namespace User\UseCase\DeleteUseCase;

use User\UseCase\DeleteUseCase\Request\DeleteUserHandleRequest;
use User\UseCase\DeleteUseCase\Request\DeleteUserIndexRequest;
use User\UseCase\DeleteUseCase\Response\DeleteUserHandleResponse;
use User\UseCase\DeleteUseCase\Response\DeleteUserIndexResponse;

interface DeleteUserUseCaseInterface
{
    public function index(DeleteUserIndexRequest $request): DeleteUserIndexResponse;

    public function handle(DeleteUserHandleRequest $request): DeleteUserHandleResponse;
}
