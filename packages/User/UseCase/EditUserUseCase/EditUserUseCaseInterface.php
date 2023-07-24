<?php

namespace User\UseCase\EditUserUseCase;

use User\UseCase\EditUserUseCase\Request\EditUserIndexRequest;
use User\UseCase\EditUserUseCase\Response\EditUserIndexResponse;

interface EditUserUseCaseInterface
{
    public function index(EditUserIndexRequest $request): EditUserIndexResponse;
}
