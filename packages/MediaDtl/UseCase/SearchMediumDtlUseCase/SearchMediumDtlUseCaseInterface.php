<?php

namespace MediaDtl\UseCase\SearchMediumDtlUseCase;

use MediaDtl\UseCase\SearchMediumDtlUseCase\SearchMediumDtlRequest\SearchMediumDtlRequest;
use MediaDtl\UseCase\SearchMediumDtlUseCase\SearchMediumDtlResponse\SearchMediumDtlResponse;

interface SearchMediumDtlUseCaseInterface
{
    public function index(SearchMediumDtlRequest $request): SearchMediumDtlResponse;
}
