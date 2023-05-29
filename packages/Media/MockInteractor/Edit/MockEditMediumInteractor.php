<?php

namespace Media\MockInteractor\Edit;

use Media\Domain\DomainService\MediumDomainService;
use Media\Domain\Media\Medium;
use Media\Domain\Media\MediumId;
use Media\Domain\Media\MediumName;
use Media\Domain\Media\MediumRepositoryInterface;
use Media\UseCase\EditMediumUseCase\EditMediumRequest;
use Media\UseCase\EditMediumUseCase\EditMediumResponse;
use Media\UseCase\EditMediumUseCase\EditMediumUseCaseInterface;
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
 * The usecase of this class is media editing.
 * 
 */
class MockEditMediumInteractor implements EditMediumUseCaseInterface
{

    /**
     * # DomainService.
     *
     * @var MediumDomainService
     */
    private $medium_domain_service;


    /**
     * # RepositoryInterface.
     *
     * @var MediumRepositoryInterface
     */
    private $repository;


    /**
     * # Constructer
     *
     * @param MediumDomainService $medium_domain_service
     * @param MediumRepositoryInterface $repository
     */
    public function __construct(
        MediumDomainService $medium_domain_service,
        MediumRepositoryInterface $repository
    ) {
        $this->medium_domain_service = $medium_domain_service;
        $this->repository = $repository;
    }


    /**
     * # Mock index info if Media.
     *
     * @param EditMediumRequest $request
     * @return EditMediumResponse
     */
    public function index(EditMediumRequest $request): EditMediumResponse
    {

        $exist_medium_data = $this->medium_domain_service->checkMediumExistById($request->getMediumId());

        if (empty($exist_medium_data)) {
            throw new UnexpectedValueException('The Medium dose not exist');
        }

        $medium_instance = new Medium(
            new MediumId($request->getMediumId()),
            new MediumName($exist_medium_data->getMediumName()->getValue())
        );

        return new EditMediumResponse(
            $medium_instance->getMediumId()->getValue(),
            $medium_instance->getMediumName()->getValue()
        );
    }


    /**
     * Mock input boundary.
     *
     * @param EditMediumRequest $request
     * @return EditMediumResponse
     */
    public function handle(EditMediumRequest $request): EditMediumResponse
    {
        $exist_medium_data = $this->medium_domain_service->checkMediumExistById($request->getMediumId());

        if (!$exist_medium_data) {
            throw new UnexpectedValueException('The Medium dose not exist');
        }

        $medium_instance = new Medium(
            new MediumId($exist_medium_data->getMediumId()->getValue()),
            new MediumName($request->getMediumName())
        );

        $this->repository->update($medium_instance);

        return new EditMediumResponse(
            $medium_instance->getMediumId()->getValue(),
            $medium_instance->getMediumName()->getValue()
        );
    }
}
