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

/**
 * --------------------------------------------------------------------------
 * # Mock input boundary.
 * --------------------------------------------------------------------------
 * 
 * ## Responsibility
 * The responsibility this class has is to compose the application usecase for Media.
 * 
 * ## UseCase
 * The UseCase of this class is media delete.
 */
class MockDeleteMediumInteractor implements DeleteMediumUseCaseInterface
{

    /**
     * DomainService.
     *
     * @var MediumDomainService
     */
    private $medium_domain_servie;


    /**
     * RepositoryInterface.
     *
     * @var MediumRepositoryInterface
     */
    private $repository;


    /**
     * Constructer.
     *
     * @param MediumDomainService $medium_domain_servie
     * @param MediumRepositoryInterface $repository
     */
    public function __construct(
        MediumDomainService $medium_domain_servie,
        MediumRepositoryInterface $repository
    ) {
        $this->medium_domain_servie = $medium_domain_servie;
        $this->repository = $repository;
    }


    /**
     * # Mock index info of Media.
     * The intention of this method is to achieve UseCase of confilm delete.
     *
     * @param DeleteMediumRequest $request
     * @return DeleteMediumResponse
     */
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


    /**
     * # Mock of delete UseCase.
     * The intention is to achieve UseCase of delete medium.
     *
     * @param DeleteMediumRequest $request
     * @return DeleteMediumResponse
     */
    public function handle(DeleteMediumRequest $request): DeleteMediumResponse
    {
        $exist_medium_data = $this->medium_domain_servie->ExistById($request->getMediumId());

        if (!$exist_medium_data) {
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
