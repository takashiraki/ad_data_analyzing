<?php

namespace Media\UseCase\SearchMediumUseCase;

interface SearchMediumUseCaseInterface
{
    public function index(SearchMediumRequest $request): SearchMediumResponse;
}
