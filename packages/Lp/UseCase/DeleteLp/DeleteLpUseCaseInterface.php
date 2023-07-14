<?php

namespace Lp\UseCase\DeleteLp;

use Lp\UseCase\DeleteLp\Request\DeleteLpIndexRequest;
use Lp\UseCase\DeleteLp\Response\DeleteLpIndexResponse;

interface DeleteLpUseCaseInterface
{
    public function index(DeleteLpIndexRequest $request): DeleteLpIndexResponse;
}