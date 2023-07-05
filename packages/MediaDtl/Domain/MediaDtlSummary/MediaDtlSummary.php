<?php

namespace MediaDtl\Domain\MediaDtlSummary;

use MediaDtl\Domain\Media\MediumId;
use MediaDtl\Domain\Media\MediumName;
use MediaDtl\Domain\MediaDtl\MediumDtlId;
use MediaDtl\Domain\MediaDtl\MediumDtlName;

class MediaDtlSummary
{
    private $medium_dtl_id;
    private $medium_dtl_name;
    private $medium_id;
    private $medium_name;

    public function __construct(
        MediumDtlId $medium_dtl_id,
        MediumDtlName $medium_dtl_name,
        MediumId $medium_id,
        MediumName $medium_name
    ) {
        $this->medium_dtl_id = $medium_dtl_id;
        $this->medium_dtl_name = $medium_dtl_name;
        $this->medium_id = $medium_id;
        $this->medium_name = $medium_name;
    }

    public function getMediumDtlId(): MediumDtlId
    {
        return $this->medium_dtl_id;
    }

    public function getMediumDtlName(): MediumDtlName
    {
        return $this->medium_dtl_name;
    }

    public function getMediumId(): MediumId
    {
        return $this->medium_id;
    }

    public function getMediumName(): MediumName
    {
        return $this->medium_name;
    }
}
