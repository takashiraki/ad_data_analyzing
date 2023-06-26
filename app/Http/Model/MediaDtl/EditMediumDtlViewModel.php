<?php

namespace App\Http\Model\MediaDtl;

class EditMediumDtlViewModel
{
    private $medium_dtl_id;
    private $medium_dtl_name;
    private $medium_id;
    private $medium_records;

    public function __construct(
        string $medium_dtl_id,
        string $medium_dtl_name,
        string $medium_id,
        array $medium_records
    ) {
        $this->medium_dtl_id = $medium_dtl_id;
        $this->medium_dtl_name = $medium_dtl_name;
        $this->medium_id = $medium_id;
        $this->medium_records = $medium_records;
    }

    public function getMediumDtlId(): string
    {
        return $this->medium_dtl_id;
    }

    public function getMediumDtlName(): string
    {
        return $this->medium_dtl_name;
    }

    public function getMediumId(): string
    {
        return $this->medium_id;
    }

    public function getMediumRecords(): array
    {
        return $this->medium_records;
    }
}
