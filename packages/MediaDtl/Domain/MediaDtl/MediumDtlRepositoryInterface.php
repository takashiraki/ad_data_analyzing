<?php

namespace MediaDtl\Domain\MediaDtl;

use MediaDtl\Domain\Media\Medium;
use MediaDtl\Domain\Media\MediumId;

interface MediumDtlRepositoryInterface
{

    public function save(MediumDtl $medium_dtl): MediumDtl;

    public function findMediumById(MediumId $id): ?Medium;

    public function findByName(MediumDtlName $name): ?MediumDtl;

    public function getMediumRecords(): ?array;
}
