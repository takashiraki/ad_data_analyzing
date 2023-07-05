<?php

namespace MediaDtl\UseCase\DeleteMediumDtlUseCase\DeleteMediumDtlRequest;

class DeleteMediumDtlHandleRequest
{
    private $medium_dtl_id;

    public function __construct(string $medium_dtl_id)
    {
        $this->medium_dtl_id = $medium_dtl_id;
    }

    public function getMediumDtlId(): string
    {
        return $this->medium_dtl_id;
    }
}
