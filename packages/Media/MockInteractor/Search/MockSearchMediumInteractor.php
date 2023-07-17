<?php

namespace Media\MockInteractor\Search;

use Media\Domain\Media\MediumRepositoryInterface;
use Media\UseCase\SearchMediumUseCase\SearchMediumRequest;
use Media\UseCase\SearchMediumUseCase\SearchMediumResponse;
use Media\UseCase\SearchMediumUseCase\SearchMediumUseCaseInterface;

/**
 * --------------------------------------------------------------------------
 * # Mock input boundary
 * --------------------------------------------------------------------------
 *
 *
 * ## Responsibility
 * The responsibility this class has is to
 * compose the application usecase for media search.
 *
 *
 * ## UseCase
 * The UseCase of this class is media search.
 */
class MockSearchMediumInteractor implements SearchMediumUseCaseInterface
{
    /**
     * # RepositoryInterface.
     *
     * @var MediumRepositoryInterface
     */
    private $repository;

    /**
     * # Constructer.
     *
     * @param MediumRepositoryInterface $repository
     */
    public function __construct(MediumRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * # Mock index info of media.
     *
     * @param SearchMediumRequest $request
     *
     * @return SearchMediumResponse
     */
    public function index(SearchMediumRequest $request): SearchMediumResponse
    {
        $medium_id = '';
        $medium_name = '';

        if ($request->getMediumId() !== null) {
            $medium_id = $request->getMediumId();
        }

        if ($request->getMediumName() !== null) {
            $medium_name = $request->getMediumName();
        }

        $records = $this->repository->getRecords($medium_id, $medium_name);

        return new SearchMediumResponse($records);
    }
}
