<?php

namespace User\MockInteractor\Edit;

use UnexpectedValueException;
use User\Domain\DomainService\OldEmail;
use User\Domain\DomainService\UserDomainService;
use User\Domain\User\Email;
use User\Domain\User\Privilege;
use User\Domain\User\User;
use User\Domain\User\UserId;
use User\Domain\User\UserName;
use User\Domain\User\UserRepositoryInterface;
use User\UseCase\EditUserUseCase\EditUserUseCaseInterface;
use User\UseCase\EditUserUseCase\Request\EditUserHandleRequest;
use User\UseCase\EditUserUseCase\Request\EditUserIndexRequest;
use User\UseCase\EditUserUseCase\Response\EditUserHandleResponse;
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

    public function handle(EditUserHandleRequest $request): EditUserHandleResponse
    {
        if (!$this->domain_service->existById(new UserId($request->getUserId()))) {
            throw new UnexpectedValueException("This user id dose not exist");
        }

        $old_user = $this->repository->findById(new UserId($request->getUserId()));

        if (!$this->domain_service->equalByEmail(
            new Email($request->getEmail()),
            new OldEmail($old_user->getEmail())
        )) {
            if ($this->domain_service->existByEmail(new Email($request->getEmail()))) {
                throw new UnexpectedValueException("This email already existed");
            }
        }

        $new_user = new User(
            $old_user->getUserId(),
            new UserName($request->getUserName()),
            new Privilege($request->getPrivilege()),
            new Email($request->getEmail()),
            $old_user->getPasswordHash(),
        );

        $this->repository->update($new_user);

        return new EditUserHandleResponse(
            $new_user->getUserId()->getValue(),
            $new_user->getUserName()->getValue(),
            $new_user->getEmail()->getValue(),
            $new_user->getUserPrivilege()->getValue(),
        );
    }
}
