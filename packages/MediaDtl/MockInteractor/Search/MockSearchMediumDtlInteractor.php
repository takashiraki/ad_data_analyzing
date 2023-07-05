<?php

namespace MediaDtl\MockInteractor\Search;

use MediaDtl\Domain\Media\MediumName;
use MediaDtl\Domain\MediaDtl\MediumDtlId;
use MediaDtl\Domain\MediaDtl\MediumDtlName;
use MediaDtl\Domain\MediaDtl\MediumDtlRepositoryInterface;
use MediaDtl\UseCase\SearchMediumDtlUseCase\SearchMediumDtlRequest\SearchMediumDtlRequest;
use MediaDtl\UseCase\SearchMediumDtlUseCase\SearchMediumDtlResponse\SearchMediumDtlResponse;
use MediaDtl\UseCase\SearchMediumDtlUseCase\SearchMediumDtlUseCaseInterface;

class MockSearchMediumDtlInteractor implements SearchMediumDtlUseCaseInterface
{
    private $repository;

    public function __construct(MediumDtlRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index(SearchMediumDtlRequest $request): SearchMediumDtlResponse
    {
        $query_medium_dtl_id = null;
        $query_medium_dtl_name = null;
        $query_medium_name = null;

        if ($this->isSet($request->getMediumDtlId())) {
            $medium_dtl_id = $request->getMediumDtlId();
        }

        if ($this->isSet($request->getMediumDtlName())) {
            $medium_dtl_name = $request->getMediumDtlName();
        }

        if ($this->isSet($request->getMediumName())) {
            $medium_name = $request->getMediumName();
        }

        $records = $this->repository->findMediumDtlWithmedia(
            $query_medium_dtl_id,
            $query_medium_dtl_name,
            $query_medium_name
        );

        return new SearchMediumDtlResponse($records);
    }

    private function isSet($value): bool
    {
        return isset($value) ? true : false;
    }
}
