<?php

namespace MediaDtl\Application\AplicationService;

class MediumDtlSummary
{
    private $medium_dtl_id;

    private $medium_dtl_name;

    private $medium_id;

    private $medium_name;

    public function __construct(
        string $medium_dtl_id,
        string $medium_dtl_name,
        string $medium_id,
        string $medium_name
    ) {
        $this->medium_dtl_id = $medium_dtl_id;
        $this->medium_dtl_name = $medium_dtl_name;
        $this->medium_id = $medium_id;
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

    public function getMediumId(): string
    {
        return $this->medium_id;
    }

    public function getMediumName(): string
    {
        return $this->medium_name;
    }

    public function changeMediumdata(string $medium_id, string $medium_name): MediumDtlSummary
    {
        $new_instance = new MediumDtlSummary(
            $this->getMediumDtlId(),
            $this->getMediumDtlName(),
            $medium_id,
            $medium_name
        );

        return $new_instance;
    }
}
