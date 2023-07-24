<?php

namespace User\MockInteractor\Edit;

use UnexpectedValueException;
use User\Domain\DomainService\UserDomainService;
use User\Domain\User\UserId;
use User\Domain\User\UserRepositoryInterface;
use User\UseCase\EditUserUseCase\EditUserUseCaseInterface;
use User\UseCase\EditUserUseCase\Request\EditUserIndexRequest;
use User\UseCase\EditUserUseCase\Response\EditUserIndexResponse;

class MockEditUserInteractor implements EditUserUseCaseInterface
{
    private $domain_service;
    private $repository;

    public function __construct(
        UserDomainService $service,
        UserRepositoryInterface $repository
    ) {
        $this->domain_service = $service;
        $this->repository = $repository;
    }
    public function index(EditUserIndexRequest $request): EditUserIndexResponse
    {
        if (!$this->domain_service->existById(new UserId($request->getUserId()))) {
            throw new UnexpectedValueException("This user id dose not exist");
        }

        $user = $this->repository->findById(new UserId($request->getUserId()));

        return new EditUserIndexResponse(
            $user->getUserId()->getValue(),
            $user->getUserName()->getValue(),
            $user->getEmail()->getValue(),
            $user->getUserPrivilege()->getValue()
        );
    }
}
