<?php

namespace Lp\MockInteractor\Search;

use Lp\Domain\Lp\LpDirectory;
use Lp\Domain\Lp\LpName;
use Lp\Domain\Lp\LpRepositoryInterface;
use Lp\UseCase\SearchLp\Request\SearchLpIndexRequest;
use Lp\UseCase\SearchLp\Response\SearchLpIndexResponse;
use Lp\UseCase\SearchLp\SearchLpUseCaseInterface;

class MockSearchLpInteractor implements SearchLpUseCaseInterface
{
    private $repository;

    public function __construct(LpRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(SearchLpIndexRequest $request): SearchLpIndexResponse
    {
        $lp_name = null;
        $lp_direcrtory = null;

        if ($request->getLpName() !== null) {
            $lp_name = new LpName($request->getLpName());
        }

        if ($request->getLpDirectory() !== null) {
            $lp_direcrtory = new LpDirectory($request->getLpDirectory());
        }

        $records = $this->repository->search($lp_name, $lp_direcrtory);

        return new SearchLpIndexResponse($records);
    }
}
