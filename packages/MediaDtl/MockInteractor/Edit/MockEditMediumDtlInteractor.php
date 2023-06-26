<?php

namespace MediaDtl\MockInteractor\Edit;

use Media\UseCase\EditMediumUseCase\EditMediumDtlResponse\EditMediumDtlSaveResponse;
use MediaDtl\Domain\DomainService\MediumDtlDomainService;
use MediaDtl\Domain\Media\MediumId;
use MediaDtl\Domain\MediaDtl\MediumDtlId;
use MediaDtl\Domain\MediaDtl\MediumDtlRepositoryInterface;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlRequest;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlRequest\EditMediumDtlSaveRequest;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlResponse;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlUseCaseInterface;
use UnexpectedValueException;

class MockEditMediumDtlInteractor implements EditMediumDtlUseCaseInterface
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

    public function index(EditMediumDtlRequest $request): EditMediumDtlResponse
    {
        $medium_dtl_id = $request->getMediumDtlId();

        $exist_medium_dtl_record = $this->medium_dtl_domain_service->existMediumDtlById($medium_dtl_id);
        if (!$exist_medium_dtl_record) {
            throw new UnexpectedValueException('This medium detail dose not exist');
        }

        $medium_dtl_record = $this->repository->findById(new MediumDtlId($medium_dtl_id));

        $medium_id = $medium_dtl_record->getMediumId()->getValue();

        $exist_medium_record = $this->medium_dtl_domain_service->existMediumById($medium_id);

        if (!$exist_medium_record) {
            throw new UnexpectedValueException('This medium dose not exist');
        }

        $medium_records = $this->repository->getMediumRecords();

        return new EditMediumDtlResponse(
            $medium_dtl_record->getMediumDtlId(),
            $medium_dtl_record->getMediumDtlName(),
            $medium_dtl_record->getMediumId(),
            $medium_records
        );
    }

    public function handle(EditMediumDtlSaveRequest $request): EditMediumDtlSaveResponse
    {
        $exist_medium_record = $this->medium_dtl_domain_service->existMediumById($request->getMediumDtlId());
        if ($this->isNotExist($exist_medium_record)) {
            throw new UnexpectedValueException('The Medium dose not exist');
        }

        $medium_record = $this->repository->findMediumById(new MediumId($request->getMediumId()));

        $exist_medium_dtl_record = $this->medium_dtl_domain_service->existMediumDtlNameInMedia($request->getMediumDtlName(), $medium_record->getMediumId()->getValue());

        if ($this->isNotExist($exist_medium_dtl_record)) {
            throw new UnexpectedValueException('The medium name is already existed');
        }
        return new EditMediumDtlSaveResponse();
    }

    private function isExited($value): bool
    {
        return $value === TRUE ? true : false;
    }

    private function isNotExist($value): bool
    {
        return $value !== TRUE ? true : false;
    }
}
