<?php

namespace User\MockInteractor\Delete;

use UnexpectedValueException;
use User\Domain\DomainService\UserDomainService;
use User\Domain\User\UserId;
use User\Domain\User\UserRepositoryInterface;
use User\UseCase\DeleteUseCase\DeleteUserUseCaseInterface;
use User\UseCase\DeleteUseCase\Request\DeleteUserHandleRequest;
use User\UseCase\DeleteUseCase\Request\DeleteUserIndexRequest;
use User\UseCase\DeleteUseCase\Response\DeleteUserHandleResponse;
use User\UseCase\DeleteUseCase\Response\DeleteUserIndexResponse;

class MockDeleteUserInteractor implements DeleteUserUseCaseInterface
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
    public function index(DeleteUserIndexRequest $request): DeleteUserIndexResponse
    {
        if (!$this->domain_service->existById(new UserId($request->getUserId()))) {
            throw new UnexpectedValueException("This user id dose not exist");
        }

        $user = $this->repository->findById(new UserId($request->getUserId()));

        return new DeleteUserIndexResponse(
            $user->getUserId()->getValue(),
            $user->getUserName()->getValue(),
            $user->getEmail()->getValue(),
            $user->getUserPrivilege()->getValue()
        );
    }

    public function handle(DeleteUserHandleRequest $request): DeleteUserHandleResponse
    {
        if (!$this->domain_service->existById(new UserId($request->getUserId()))) {
            throw new UnexpectedValueException("This user id dose not eixist");
        }

        $user = $this->repository->findById(new UserId($request->getUserId()));

        $this->repository->delete($user);

        return new DeleteUserHandleResponse(
            $user->getUserId()->getValue(),
            $user->getUserName()->getValue(),
            $user->getEmail()->getValue(),
            $user->getUserPrivilege()->getValue(),
        );
    }
}
