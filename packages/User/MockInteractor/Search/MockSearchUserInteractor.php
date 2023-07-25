<?php

namespace User\MockInteractor\Search;

use User\Domain\User\Email;
use User\Domain\User\Privilege;
use User\Domain\User\UserName;
use User\Domain\User\UserRepositoryInterface;
use User\UseCase\SearchUserUseCase\Request\SearchUserIndexRequest;
use User\UseCase\SearchUserUseCase\Response\SearchUserIndexResponse;
use User\UseCase\SearchUserUseCase\SearchUserUseCaseInterface;

class MockSearchUserInteractor implements SearchUserUseCaseInterface
{
    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index(SearchUserIndexRequest $request): SearchUserIndexResponse
    {
        return new SearchUserIndexResponse($this->repository->search(
            $request->getQueryUserName() !== null ? new UserName($request->getQueryUserName()) : null,
            $request->getQueryEmail() !== null ? new Email($request->getQueryEmail()) : null,
            $request->getQueryPrivilege() !== null ? new Privilege($request->getQueryPrivilege()) : null,
        ));
    }
}
