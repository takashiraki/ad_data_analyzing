<?php

namespace User\UseCase\SearchUserUseCase;

use User\UseCase\SearchUserUseCase\Request\SearchUserIndexRequest;
use User\UseCase\SearchUserUseCase\Response\SearchUserIndexResponse;

interface SearchUserUseCaseInterface
{
    public function index(SearchUserIndexRequest $request): SearchUserIndexResponse;
}
