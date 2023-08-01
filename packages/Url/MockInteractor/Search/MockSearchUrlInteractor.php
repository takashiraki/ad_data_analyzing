<?php

namespace Url\MockInteractor\Search;

use Form\Domain\Form\FormName;
use Lp\Domain\Lp\LpName;
use Media\Domain\Media\MediumName;
use MediaDtl\Domain\MediaDtl\MediumDtlName;
use Url\Domain\Url\UrlName;
use Url\Domain\Url\UrlRepositoryInterface;
use Url\UseCase\SearchUrlUseCase\SearchUrlIndexRequest;
use Url\UseCase\SearchUrlUseCase\SearchUrlIndexResponse;
use Url\UseCase\SearchUrlUseCase\SearchUrlUseCaseInterface;

class MockSearchUrlInteractor implements SearchUrlUseCaseInterface
{

    /**
     * @var UrlRepositoryInterface
     */
    private $repository;


    /**
     * constructer
     *
     * @param UrlRepositoryInterface $repository
     */
    public function __construct(
        UrlRepositoryInterface  $repository
    ) {
        $this->repository = $repository;
    }


    /**
     * Index
     *
     * @param SearchUrlIndexRequest $request
     * @return SearchUrlIndexResponse
     */
    public function index(SearchUrlIndexRequest $request): SearchUrlIndexResponse
    {
        $records = $this->repository->search(
            $request->getUrlName() !== null ? new UrlName($request->getUrlName()) : null,
            $request->getMediumName() !== null ? new MediumName($request->getMediumName()) : null,
            $request->getMediumDtlName() !== null ? new MediumDtlName($request->getMediumDtlName()) : null,
            $request->getLpName() !== null ? new LpName($request->getLpName()) : null,
            $request->getFormName() !== null ? new FormName($request->getFormName()) : null,
        );

        return new SearchUrlIndexResponse($records);
    }
}
