<?php

namespace Media\MockInteractor\Search;

use Media\Domain\Media\MediumId;
use Media\Domain\Media\MediumName;
use Media\Domain\Media\MediumRepositoryInterface;
use Media\UseCase\SearchMediumUseCase\EnumSearchMediumRequest;
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

        $medium_id = '';
        $medium_name = '';

        if ($request->getMediumId() !== EnumSearchMediumRequest::null) {
            $medium_id = $request->getMediumId();
        }

        if ($request->getMediumName() !== EnumSearchMediumRequest::null) {
            $medium_name = $request->getMediumName();
        }

        $records = $this->repository->getRecords($medium_id, $medium_name);

        dd($records);

        return new SearchMediumResponse();
    }
}
