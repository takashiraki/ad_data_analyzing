<?php

namespace MediaDtl\Domain\MediaDtl;

use MediaDtl\Domain\Media\Medium;
use MediaDtl\Domain\Media\MediumId;
use MediaDtl\Domain\Media\MediumName;

interface MediumDtlRepositoryInterface
{

    public function save(MediumDtl $medium_dtl): MediumDtl;

    public function update(MediumDtl $medium_dtl): MediumDtl;

    public function delete(MediumDtl $medium_dtl): MediumDtl;

    public function findMediumById(MediumId $id): ?Medium;

    public function findById(MediumDtlId $id): ?MediumDtl;

    public function findByName(MediumDtlName $name): ?MediumDtl;

    public function findByNameInMedium(MediumDtlName $name, MediumId $Id);

    public function findMediumDtlWithmedia(
        ?string $medium_dtl_id,
        ?string $medium_dtl_name,
        ?string $medium_name
    );

    public function getMediumRecords(): ?array;
}
