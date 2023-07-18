<?php

namespace MediaDtl\MockInteractor\Create;

use illuminate\Support\Str;
use MediaDtl\DOmain\DomainService\MediumDtlDomainService;
use MediaDtl\Domain\Media\MediumId;
use MediaDtl\Domain\MediaDtl\MediumDtl;
use MediaDtl\Domain\MediaDtl\MediumDtlId;
use MediaDtl\Domain\MediaDtl\MediumDtlName;
use MediaDtl\Domain\MediaDtl\MediumDtlRepositoryInterface;
use MediaDtl\UseCase\CreateMediaDtlUseCase\CreateMediumDtlRequest;
use MediaDtl\UseCase\CreateMediaDtlUseCase\CreateMediumDtlResponse;
use MediaDtl\UseCase\CreateMediaDtlUseCase\CreateMediumDtlUseCaseInterface;
use UnexpectedValueException;

class MockCreateMediumDtlInteractor implements CreateMediumDtlUseCaseInterface
{
    private $medium_dtl_domain_service;

    private $repository;

    public function __construct(
        MediumDtlDomainService $domain_service,
        MediumDtlRepositoryInterface $repository
    ) {
        $this->medium_dtl_domain_service = $domain_service;
        $this->repository = $repository;
    }

    public function index(): CreateMediumDtlResponse
    {
        $medium_records = $this->repository->getMediumRecords();
        return new CreateMediumDtlResponse(
            null,
            null,
            null,
            null,
            $medium_records,
        );
    }

    public function handle(CreateMediumDtlRequest $request): CreateMediumDtlResponse
    {
        $exist_medium = $this->medium_dtl_domain_service->existMediumById($request->getMediumId());

        if (! $exist_medium) {
            throw new UnexpectedValueException('This medium dose not exist');
        }

        $medium_record = $this->repository->findMediumById(new MediumId($request->getMediumId()));

        $exist_medim_dtl = $this->medium_dtl_domain_service->existMediumDtlNameInMedia($request->getMediumDtlName());

        if ($exist_medim_dtl) {
            //
        }

        $medium_dtl_instance = new MediumDtl(
            new MediumDtlId((string)Str::uuid()),
            new MediumDtlName($request->getMediumDtlName()),
            new MediumId($request->getMediumId())
        );

        $this->repository->save($medium_dtl_instance);

        return new CreateMediumDtlResponse(
            $medium_dtl_instance->getMediumDtlId()->getValue(),
            $medium_dtl_instance->getMediumDtlName()->getValue(),
            $medium_dtl_instance->getMediumId()->getValue(),
            $medium_record->getMediumName()->getValue(),
            null
        );
    }
}
