<?php

namespace MediaDtl\MockInteractor\Delete;

use MediaDtl\Domain\DomainService\MediumDtlDomainService;
use MediaDtl\Domain\MediaDtl\MediumDtlId;
use MediaDtl\Domain\MediaDtl\MediumDtlRepositoryInterface;
use MediaDtl\UseCase\DeleteMediumDtlUseCase\DeleteMediumDtlRequest\DeleteMediumDtlHandleRequest;
use MediaDtl\UseCase\DeleteMediumDtlUseCase\DeleteMediumDtlRequest\DeleteMediumDtlIndexRequest;
use MediaDtl\UseCase\DeleteMediumDtlUseCase\DeleteMediumDtlResponse\DeleteMediumDtlHandleResponse;
use MediaDtl\UseCase\DeleteMediumDtlUseCase\DeleteMediumDtlResponse\DeleteMediumDtlIndexResponse;
use MediaDtl\UseCase\DeleteMediumDtlUseCase\DeleteMediumDtlUseCaseInterface;
use UnexpectedValueException;

class MockDeleteMediumDtlInteractor implements DeleteMediumDtlUseCaseInterface
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

    public function index(DeleteMediumDtlIndexRequest $request): DeleteMediumDtlIndexResponse
    {
        $medium_dtl_id = new MediumDtlId($request->getMediumDtlId());

        $exist_medium_dtl = $this
            ->medium_dtl_domain_service->existMediumDtlById($medium_dtl_id);

        if ($this->isNotExist($exist_medium_dtl)) {
            throw new UnexpectedValueException('This media detail dose not exist');
        }

        $medium_dtl_record = $this->repository->findById($medium_dtl_id);

        $medium_id = $medium_dtl_record->getMediumId();

        $exist_medium = $this->medium_dtl_domain_service->existMediumById($medium_id);

        if ($this->isNotExist($exist_medium)) {
            throw new UnexpectedValueException('This media detail dose not exist');
        }

        $medium_record = $this->repository->findMediumById($medium_id);

        return new DeleteMediumDtlIndexResponse(
            $medium_dtl_record->getMediumDtlId()->getValue(),
            $medium_dtl_record->getMediumDtlName()->getValue(),
            $medium_record->getMediumName()->getValue()
        );
    }

    public function handle(DeleteMediumDtlHandleRequest $request): DeleteMediumDtlHandleResponse
    {
        $medium_dtl_id = new MediumDtlId($request->getMediumDtlId());

        $exist_medium_dtl = $this->medium_dtl_domain_service->existMediumDtlById($medium_dtl_id);

        if ($this->isNotExist($exist_medium_dtl)) {
            throw new UnexpectedValueException('This medium detail dose not exist');
        }

        $medium_dtl_record = $this->repository->findById($medium_dtl_id);

        $this->repository->delete($medium_dtl_record);

        $medium_id = $medium_dtl_record->getMediumId();
        $medium_record = $this->repository->findMediumById($medium_id);

        return new DeleteMediumDtlHandleResponse(
            $medium_dtl_record->getMediumDtlId()->getValue(),
            $medium_dtl_record->getMediumDtlName()->getValue(),
            $medium_record->getMediumName()->getValue()
        );
    }

    private function isNotExist(bool $value): bool
    {
        return empty($value) ? true : false;
    }
}
