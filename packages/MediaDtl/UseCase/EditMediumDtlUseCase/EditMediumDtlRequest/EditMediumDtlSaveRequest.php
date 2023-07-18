<?php

namespace MediaDtl\UseCase\EditMediumDtlUseCase\EditMediumDtlRequest;

class EditMediumDtlSaveRequest
{
    private $medium_dtl_id;

    private $medium_dtl_name;

    private $medium_id;

    public function __construct(
        string $medium_dtl_id,
        string $medium_dtl_name,
        string $medium_id
    ) {
        $this->medium_dtl_id = $medium_dtl_id;
        $this->medium_dtl_name = $medium_dtl_name;
        $this->medium_id = $medium_id;
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
}
