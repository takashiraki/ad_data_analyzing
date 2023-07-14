<?php

namespace Lp\UseCase\EditLp;

use Lp\UseCase\EditLp\Request\EditLpHandleRequest;
use Lp\UseCase\EditLp\Request\EditLpIndexRequest;
use Lp\UseCase\EditLp\Response\EditLpHandleResponse;
use Lp\UseCase\EditLp\Response\EditLpIndexResponse;

interface EditLpUseCaseInterface
{
    public function index(EditLpIndexRequest $request): EditLpIndexResponse;

    public function handle(EditLpHandleRequest $request): EditLpHandleResponse;
}
