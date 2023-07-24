<?php

namespace User\MockInteractor\Create;

use UnexpectedValueException;
use User\Domain\DomainService\UserDomainService;
use User\Domain\User\Email;
use User\Domain\User\User;
use User\Domain\User\UserId;
use User\Domain\User\UserRepositoryInterface;
use User\UseCase\CreateUserUseCase\CreateUserUseCaseInterface;
use User\UseCase\CreateUserUseCase\Request\CreateUserHandleRequest;
use User\UseCase\CreateUserUseCase\Response\CreateUserHandleResponse;
use illuminate\Support\Str;
use User\Domain\DomainService\RawPassword;
use User\Domain\User\Privilege;
use User\Domain\User\UserName;

class MockCreateUserInteractor implements CreateUserUseCaseInterface
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

    public function handle(CreateUserHandleRequest $request): CreateUserHandleResponse
    {
        if ($this->domain_service->existByEmail(new Email($request->getEmail()))) {
            throw new UnexpectedValueException("This email already existed");
        }

        $user = new User(
            new UserId((string)Str::uuid()),
            new UserName($request->getUserName()),
            new Privilege($request->getPrivilege()),
            new Email($request->getEmail()),
            $this->domain_service->createHasedPassword(new RawPassword($request->getRawPassword())),
        );

        $this->repository->save($user);

        return new CreateUserHandleResponse(
            $user->getUserId()->getValue(),
            $user->getUserName()->getValue(),
            $user->getEmail()->getValue(),
            $user->getUserPrivilege()->getValue(),
        );
    }
}
