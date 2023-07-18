<?php

namespace MediaDtl\UseCase\CreateMediaDtlUseCase;

class CreateMediumDtlRequest
{
    private $medium_dtl_name;

    private $medium_id;

    public function __construct(string $medium_dtl_name, string $medium_id)
    {
        $this->medium_dtl_name = $medium_dtl_name;
        $this->medium_id = $medium_id;
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
