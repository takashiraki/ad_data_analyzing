<?php

namespace App\Http\Model\MediaDtl\Delete;

use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class DeleteMediumDtlHandleViewModel
{
    private $medium_dtl_id;
    private $medium_dtl_name;
    private $medium_name;

    public function __construct(
        string $medium_dtl_id,
        string $medium_dtl_name,
        string $medium_name
    ) {
        $this->medium_dtl_id = $medium_dtl_id;
        $this->medium_dtl_name = $medium_dtl_name;
        $this->medium_name = $medium_name;
    }

    public function getMediumDtlId(): string
    {
        return $this->medium_dtl_id;
    }

    public function getMediumDtlName(): string
    {
        return $this->medium_dtl_name;
    }

    public function getMediumName(): string
    {
        return $this->medium_name;
    }
}
