<?php

namespace Url\UseCase\SearchUrlUseCase;

interface SearchUrlUseCaseInterface
{
    public function index(SearchUrlIndexRequest $request): SearchUrlIndexResponse;
}
