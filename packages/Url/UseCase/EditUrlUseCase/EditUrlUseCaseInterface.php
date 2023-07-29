<?php

namespace Url\UseCase\EditUrlUseCase;

use Url\UseCase\EditUrlUseCase\Request\EditUrlIndexRequest;
use Url\UseCase\EditUrlUseCase\Response\EditUrlIndexResponse;

interface EditUrlUseCaseInterface
{
    public function index(EditUrlIndexRequest $request): EditUrlIndexResponse;
}
