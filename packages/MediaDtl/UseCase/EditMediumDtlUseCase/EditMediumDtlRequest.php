<?php

namespace MediaDtl\UseCase\EditMediumDtlUseCase;

class EditMediumDtlRequest
{
    private $medium_dtl_id;

    public function __construct(string $id)
    {
        $this->medium_dtl_id = $id;
    }

    public function getMediumDtlId(): string
    {
        return $this->medium_dtl_id;
    }
}
