<?php

namespace MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlResponse;

use MediaDtl\Domain\Media\MediumName;
use MediaDtl\Domain\MediaDtl\MediumDtlId;
use MediaDtl\Domain\MediaDtl\MediumDtlName;

class EditMediumDtlSaveResponse
{
    private $medium_dtl_id;
    private $medium_dtl_name;
    private $medium_name;

    public function __construct(
        MediumDtlId $medium_dtl_id,
        MediumDtlName $medium_dtl_name,
        MediumName $medium_name
    ) {
        $this->medium_dtl_id = $medium_dtl_id;
        $this->medium_dtl_name = $medium_dtl_name;
        $this->medium_name = $medium_name;
    }

    public function getMediumDtlId(): string
    {
        return $this->medium_dtl_id->getValue();
    }

    public function getMediumDtlName(): string
    {
        return $this->medium_dtl_name->getValue();
    }

    public function getMediumName(): string
    {
        return $this->medium_name->getValue();
    }
}
