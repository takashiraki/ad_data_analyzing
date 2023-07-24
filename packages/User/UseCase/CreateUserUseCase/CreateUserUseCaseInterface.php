<?php

namespace User\UseCase\CreateUserUseCase;

use User\UseCase\CreateUserUseCase\Request\CreateUserHandleRequest;
use User\UseCase\CreateUserUseCase\Response\CreateUserHandleResponse;

interface CreateUserUseCaseInterface
{
    public function handle(CreateUserHandleRequest $request): CreateUserHandleResponse;
}
