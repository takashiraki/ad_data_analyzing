<?php

namespace MediaDtl\MockInteractor\Edit;

use MediaDtl\Domain\DomainService\MediumDtlDomainService;
use MediaDtl\Domain\Media\MediumId;
use MediaDtl\Domain\MediaDtl\MediumDtl;
use MediaDtl\Domain\MediaDtl\MediumDtlId;
use MediaDtl\Domain\MediaDtl\MediumDtlName;
use MediaDtl\Domain\MediaDtl\MediumDtlRepositoryInterface;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlRequest\EditMediumDtlSaveRequest;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlRequest\EditMediumDtlViewRequest;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlResponse\EditMediumDtlViewResponse;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlUseCaseInterface;
use MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlResponse\EditMediumDtlSaveResponse;
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

    public function index(EditMediumDtlViewRequest $request): EditMediumDtlViewResponse
    {

        $medium_dtl_id = new MediumDtlId($request->getMediumDtlId());

        $exist_medium_dtl_record = $this->medium_dtl_domain_service
            ->existMediumDtlById($medium_dtl_id);

        if (!$exist_medium_dtl_record) {
            throw new UnexpectedValueException('This medium detail dose not exist');
        }

        $medium_dtl_record = $this->repository->findById($medium_dtl_id);

        $medium_id = $medium_dtl_record->getMediumId();

        $exist_medium_record = $this->medium_dtl_domain_service->existMediumById($medium_id);

        if (!$exist_medium_record) {
            throw new UnexpectedValueException('This medium dose not exist');
        }

        $medium_records = $this->repository->getMediumRecords();

        return new EditMediumDtlViewResponse(
            $medium_dtl_record->getMediumDtlId(),
            $medium_dtl_record->getMediumDtlName(),
            $medium_dtl_record->getMediumId(),
            $medium_records
        );
    }

    public function handle(EditMediumDtlSaveRequest $request): EditMediumDtlSaveResponse
    {

        $medium_id = new MediumId($request->getMediumId());
        $medium_dtl_id = new MediumDtlId($request->getMediumDtlId());
        $new_medium_dtl_name = new MediumDtlName($request->getMediumDtlName());

        $exist_medium_record = $this->medium_dtl_domain_service
            ->existMediumById($medium_id);

        if ($this->isNotExisted($exist_medium_record)) {
            throw new UnexpectedValueException('The Medium dose not exist');
        }
        $medium_record = $this->repository
            ->findMediumById($medium_id);


        $exist_medium_dtl_record = $this->medium_dtl_domain_service
            ->existMediumDtlById($medium_dtl_id);

        if ($this->isNotExisted($exist_medium_dtl_record)) {
            throw new UnexpectedValueException('The medium detail dose not exist');
        }

        $exist_medium_dtl_name_in_media = $this->medium_dtl_domain_service
            ->existMediumDtlNameInMedia(
                $new_medium_dtl_name,
                $medium_id
            );

        if ($this->isExisted($exist_medium_dtl_name_in_media)) {
            throw new UnexpectedValueException('The medium detail name is already existed');
        }

        $update_data_of_medium_dtl = new MediumDtl(
            $medium_dtl_id,
            $new_medium_dtl_name,
            $medium_id
        );

        $this->repository->update($update_data_of_medium_dtl);

        return new EditMediumDtlSaveResponse(
            $medium_dtl_id,
            $new_medium_dtl_name,
            $medium_record->getMediumName()
        );
    }

    private function isExisted($value): bool
    {
        return $value === TRUE ? true : false;
    }

    private function isNotExisted($value): bool
    {
        return $value !== TRUE ? true : false;
    }
}
