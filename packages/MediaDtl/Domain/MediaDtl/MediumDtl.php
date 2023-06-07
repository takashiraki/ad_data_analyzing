<?php

namespace MediaDtl\Domain\MediaDtl;

use MediaDtl\Domain\Media\MediumId;

class MediumDtl
{
    private $medium_dtl_id;
    private $medium_dtl_name;
    private $medium_id;

    public function __construct(MediumDtlId $medium_dtl_id, MediumDtlName $name, MediumId $medium_id)
    {
        $this->medium_dtl_id = $medium_dtl_id;
        $this->medium_dtl_name = $name;
        $this->medium_id = $medium_id;
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
}
