<?php

namespace Media\MockInteractor\Create;

use UnexpectedValueException;
use illuminate\Support\Str;
use Media\Domain\DomainService\MediumDomainService;
use Media\Domain\Media\Medium;
use Media\Domain\Media\MediumId;
use Media\Domain\Media\MediumName;
use Media\Domain\Media\MediumRepositoryInterface;
use Media\UseCase\CreateMediumUseCase\CreateMediumRequest;
use Media\UseCase\CreateMediumUseCase\CreateMediumResponse;
use Media\UseCase\CreateMediumUseCase\CreateMediumUseCaseInterface;

/**
 * --------------------------------------------------------------------------
 * # Mock input boundary.
 * --------------------------------------------------------------------------
 * 
 * 
 * ## Responsibility
 * The responsibility that this class has is to compose the application usecase for Media.
 * 
 * ## UseCase
 * The usecase of this class is media registration.
 */
class MockCreateMediumInteractor implements CreateMediumUseCaseInterface
{

    /**
     * # DomainServie.
     *
     * @var MediumDomainService.
     */
    private $medium_domain_service;


    /**
     * # RepositoryInterfae
     *
     * @var MediumRepositoryInterface
     */
    private $repository;


    /**
     * # Constructer.
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
     * Achieving UseCase of create medium.
     *
     * @param CreateMediumRequest $request
     * @return CreateMediumResponse
     */
    public function handle(CreateMediumRequest $request): CreateMediumResponse
    {
        $check_duplicated_medium_name = $this->medium_domain_service->checkingMediumExistByName($request->getMediumName());

        if ($check_duplicated_medium_name) {
            throw new UnexpectedValueException('This medium name is already existed');
        }

        $medium_id = (string)Str::uuid();

        $medium_instance = new Medium(
            new MediumId($medium_id),
            new MediumName($request->getMediumName()),
        );

        $this->repository->save($medium_instance);

        return new CreateMediumResponse(
            $medium_instance->getMediumId()->getValue(),
            $medium_instance->getMediumName()->getValue()
        );
    }
}
