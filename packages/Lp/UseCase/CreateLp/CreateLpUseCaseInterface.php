<?php

namespace Lp\UseCase\CreateLp;

use Lp\UseCase\CreateLp\Request\CreateLpHandleRequest;
use Lp\UseCase\CreateLp\Response\CreateLpHandleResponse;

interface CreateLpUseCaseInterface
{
    public function handle(CreateLpHandleRequest $request): CreateLpHandleResponse;
}
