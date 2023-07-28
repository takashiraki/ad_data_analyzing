<?php

namespace Url\MockInteractor\Create;

use Url\Domain\Url\UrlRepositoryInterface;
use Url\UseCase\CreateUrlUseCase\CreateUrlUseCaseInterface;
use Url\UseCase\CreateUrlUseCase\Response\CreateUrlIndexResponse;

class MockCreateUrlInteractor implements CreateUrlUseCaseInterface
{
    private $repository;

    public function __construct(
        UrlRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    public function index(): CreateUrlIndexResponse
    {
        return new CreateUrlIndexResponse(
            $this->repository->getAllMedia(),
            $this->repository->getAllMediaDtls(),
            $this->repository->getAllLps(),
            $this->repository->getAllForms(),
        );
    }
}
