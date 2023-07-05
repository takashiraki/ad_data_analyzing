<?php

namespace MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlResponse;

use MediaDtl\Domain\Media\MediumId;
use MediaDtl\Domain\MediaDtl\MediumDtlId;
use MediaDtl\Domain\MediaDtl\MediumDtlName;

class EditMediumDtlViewResponse
{
    private $medium_dtl_id;
    private $medium_dtl_name;
    private $medium_id;
    private $medium_records;

    public function __construct(
        MediumDtlId $medium_dtl_id,
        MediumDtlName $name,
        MediumId $medium_id,
        ?array $medium_records
    ) {
        $this->medium_dtl_id = $medium_dtl_id;
        $this->medium_dtl_name = $name;
        $this->medium_id = $medium_id;
        $this->medium_records = $medium_records;
    }

    public function getMediumDtlId(): string
    {
        return $this->medium_dtl_id->getValue();
    }

    public function getMediumDtlName(): string
    {
        return $this->medium_dtl_name->getValue();
    }

    public function getMediumId(): string
    {
        return $this->medium_id->getValue();
    }

    public function getMediumRecords(): ?array
    {
        return $this->medium_records;
    }
}
