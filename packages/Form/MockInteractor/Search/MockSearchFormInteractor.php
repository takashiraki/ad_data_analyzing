<?php

namespace Form\MockInteractor\Search;

use Form\Domain\Form\FormDirectory;
use Form\Domain\Form\FormName;
use Form\Domain\Form\FormRepositoryInterface;
use Form\UseCase\SearchForm\Request\SearchFormIndexRequest;
use Form\UseCase\SearchForm\Response\SearchFormIndexResponse;
use Form\UseCase\SearchForm\SearchFormUseCaseInterface;

class MockSearchFormInteractor implements SearchFormUseCaseInterface
{
    private $repository;

    public function __construct(FormRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(SearchFormIndexRequest $request): SearchFormIndexResponse
    {
        $query_name = $request->getQueryName() !== null ?
            new FormName($request->getQueryName()) : null;

        $query_directory = $request->getQueryDirectory() !== null ?
            new FormDirectory($request->getQueryDirectory()) : null;

        $records = $this->repository->search($query_name, $query_directory);

        return new SearchFormIndexResponse($records);
    }
}
