<?php

namespace MediaDtl\Domain\DomainService;

use MediaDtl\Domain\Media\MediumId;
use MediaDtl\Domain\MediaDtl\MediumDtlId;
use MediaDtl\Domain\MediaDtl\MediumDtlName;
use MediaDtl\Domain\MediaDtl\MediumDtlRepositoryInterface;

class MediumDtlDomainService
{
    private $repository;

    public function __construct(MediumDtlRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function existMediumById(MediumId $medium_dtl_id): bool
    {
        $exist_medium = $this->repository->findMediumById($medium_dtl_id);

        return isset($exist_medium) ? true : false;
    }

    public function existMediumDtlById(MediumDtlId $medium_dtl_id): bool
    {
        $exist_medium_dtl = $this->repository->findById($medium_dtl_id);

        return isset($exist_medium_dtl) ? true : false;
    }

    public function existMediumDtlNameInMedia(MediumDtlName $medium_dtl_name, MediumId $medium_id): bool
    {
        $exist_medium_dtl = $this->repository->findByName($medium_dtl_name);

        return isset($exist_medium_dtl) ? true : false;
    }
}
