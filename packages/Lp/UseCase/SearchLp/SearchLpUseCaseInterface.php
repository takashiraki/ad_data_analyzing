<?php

namespace Lp\UseCase\SearchLp;

use Lp\UseCase\SearchLp\Request\SearchLpIndexRequest;
use Lp\UseCase\SearchLp\Response\SearchLpIndexResponse;

interface SearchLpUseCaseInterface
{
    public function index(SearchLpIndexRequest $request): SearchLpIndexResponse;
}
