<?php

namespace Form\UseCase\SearchForm;

use Form\UseCase\SearchForm\Request\SearchFormIndexRequest;
use Form\UseCase\SearchForm\Response\SearchFormIndexResponse;

interface SearchFormUseCaseInterface
{
    public function index(SearchFormIndexRequest $request): SearchFormIndexResponse;
}
