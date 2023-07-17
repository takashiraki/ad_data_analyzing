<?php

namespace MediaDtl\UseCase\CreateMediaDtlUseCase;

class CreateMediumDtlResponse
{
    private $medium_dtl_id;

    private $medium_dtl_name;

    private $medium_id;

    private $medium_name;

    private $medium_records;

    public function __construct(
        null|string $medium_dtl_id,
        null|string $medium_dtl_name,
        null|string $medium_id,
        null|string $medium_name,
        null|array $medium_records
    ) {
        $this->medium_dtl_id = $medium_dtl_id;
        $this->medium_dtl_name = $medium_dtl_name;
        $this->medium_id = $medium_id;
        $this->medium_name = $medium_name;
        $this->medium_records = $medium_records;
    }

    public function getMediumDtlId(): ?string
    {
        return $this->medium_dtl_id;
    }

    public function getMediumDtlName(): ?string
    {
        return $this->medium_dtl_name;
    }

    public function getMediumId(): ?string
    {
        return $this->medium_id;
    }

    public function getMediumName(): ?string
    {
        return $this->medium_name;
    }

    public function getMediumRecords(): ?array
    {
        return $this->medium_records;
    }
}
