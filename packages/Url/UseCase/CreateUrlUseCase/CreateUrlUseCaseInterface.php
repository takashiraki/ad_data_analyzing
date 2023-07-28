<?php

namespace Url\UseCase\CreateUrlUseCase;

use Url\UseCase\CreateUrlUseCase\Response\CreateUrlIndexResponse;

interface CreateUrlUseCaseInterface
{
    public function index(): CreateUrlIndexResponse;
}
