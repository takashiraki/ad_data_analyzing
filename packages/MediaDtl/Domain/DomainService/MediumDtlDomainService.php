<?php

namespace MediaDtl\Domain\DomainService;

use MediaDtl\Domain\Media\MediumId as MediaMediumId;
use MediaDtl\Domain\Media\MediumName;
use MediaDtl\Domain\MediaDtl\MediumDtlName;
use MediaDtl\Domain\MediaDtl\MediumDtlRepositoryInterface;
use MediaDtl\Domain\MediaDtl\MediumId;

class MediumDtlDomainService
{
    private $repository;

    public function __construct(MediumDtlRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function existMediumById(string $id): bool
    {
        $medium_id = new MediaMediumId($id);

        $exist_medium = $this->repository->findMediumById($medium_id);

        return !empty($exist_medium) ? true : false;
    }

    public function existMediumDtlNameInMedia(string $name): bool
    {
        $medium_dtl_name = new MediumDtlName($name);

        $exist_medium_dtl = $this->repository->findByName($medium_dtl_name);

        return !empty($exist_medium_dtl) ? true : false;
    }
}
