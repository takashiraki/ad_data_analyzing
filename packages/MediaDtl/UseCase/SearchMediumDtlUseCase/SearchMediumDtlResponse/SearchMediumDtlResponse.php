<?php

namespace MediaDtl\UseCase\SearchMediumDtlUseCase\SearchMediumDtlResponse;

class SearchMediumDtlResponse
{
    private $query_medium_dtl_id;
    private $query_medium_dtl_name;
    private $query_medium_name;
    private $meium_dtl_summary;

    public function __construct(?array $meium_dtl_summary)
    {
        $this->meium_dtl_summary = $meium_dtl_summary;
    }

    public function getMediumDtlSummary(): ?array
    {
        return $this->meium_dtl_summary;
    }
}
