<?php

namespace Media\MockInteractor\Search;

use Media\Domain\Media\MediumRepositoryInterface;
use Media\UseCase\SearchMediumUseCase\SearchMediumRequest;
use Media\UseCase\SearchMediumUseCase\SearchMediumResponse;
use Media\UseCase\SearchMediumUseCase\SearchMediumUseCaseInterface;

class MockSearchMediumInteractor implements SearchMediumUseCaseInterface
{
    private $repository;

    public function __construct(MediumRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index(SearchMediumRequest $request): SearchMediumResponse
    {
        dd($request);
        return new SearchMediumResponse();
    }
}
