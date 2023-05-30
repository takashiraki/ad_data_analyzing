<?php

namespace Media\MockInteractor\Delete;

use Media\Domain\DomainService\MediumDomainService;
use Media\Domain\Media\Medium;
use Media\Domain\Media\MediumId;
use Media\Domain\Media\MediumName;
use Media\Domain\Media\MediumRepositoryInterface;
use Media\UseCase\DeleteMediumUseCase\DeleteMediumRequest;
use Media\UseCase\DeleteMediumUseCase\DeleteMediumResponse;
use Media\UseCase\DeleteMediumUseCase\DeleteMediumUseCaseInterface;
use UnexpectedValueException;

class MockDeleteMediumInteractor implements DeleteMediumUseCaseInterface
{
    private $medium_domain_servie;
    private $repository;

    public function __construct(
        MediumDomainService $medium_domain_servie,
        MediumRepositoryInterface $repository
    ) {
        $this->medium_domain_servie = $medium_domain_servie;
        $this->repository = $repository;
    }

    public function index(DeleteMediumRequest $request): DeleteMediumResponse
    {
        $exist_medium_data = $this->medium_domain_servie->ExistById($request->getMediumId());
        if (empty($exist_medium_data)) {
            throw new UnexpectedValueException('The medium dose not exist');
        }

        $medium_data = $this->repository->find(new MediumId($request->getMediumId()));

        $medium_instance = new Medium(
            new MediumId($medium_data->getMediumId()->getValue()),
            new MediumName($medium_data->getMediumName()->getValue())
        );

        return new DeleteMediumResponse(
            $medium_instance->getMediumId()->getValue(),
            $medium_instance->getMediumName()->getValue()
        );
    }

    public function handle(DeleteMediumRequest $request): DeleteMediumResponse
    {
        $exist_medium_data = $this->medium_domain_servie->ExistById($request->getMediumId());

        if (empty($exist_medium_data)) {
            throw new UnexpectedValueException('The medium dose not exist');
        }
        $medium_data = $this->repository->find(new MediumId($request->getMediumId()));

        $medium_instance = new Medium(
            new MediumId($request->getMediumId()),
            new MediumName($medium_data->getMediumName()->getValue())
        );

        $this->repository->delete($medium_instance);

        return new DeleteMediumResponse(
            $medium_instance->getMediumId()->getValue(),
            $medium_instance->getMediumName()->getValue()
        );
    }
}
